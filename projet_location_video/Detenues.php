<?php
	include('Outils.inc');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN" "http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>Films détenus</title>
		<link rel='stylesheet' media='screen' href='deroule.css' />
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	</head>
	<body>
		<?php
			echo banniere('IdentificationD.php', 'Yvan');
			$cnx = DB_connect();
			
			if($cnx == 0){
				echo "</body></html>";
				exit();
			}
			
			$req1 = "SELECT ABONNES.Code FROM ABONNES WHERE ABONNES.Code = '".$_POST['pass']."' AND ABONNES.Nom = '".$_POST['nom']."'";
			//$req2 = "SELECT ACTEURS.Acteur FROM ACTEURS WHERE ACTEURS.NoFilm = '".$_GET['nuFilm']."'";
			$req2 = "select EMPRES.NoFilm,EMPRES.NoExemplaire,FILMS.Titre,FILMS.Realisateur,EMPRES.DateEmpRes from EMPRES,FILMS where EMPRES.NoFilm=FILMS.NoFilm and EMPRES.CodeAbonne='".$_POST['pass']."'";
			
			//echo $_POST['nom'];
			
			$resultat1=DB_execSQL($req1, $cnx);
			if($resultat1!=0){
				if(!($abonne=mysql_fetch_object($resultat1))){
					echo "Le nom et le code soumis ne sont pas enregistrés dans la base de donnée<br/>";
					echo "<a href='javascript:history.back()'>Retour à la page précédente</a>";
				}else{
					$resultat2=DB_execSQL($req2, $cnx);
					if($resultat2!=0){
						$test="false";
						while($film=mysql_fetch_object($resultat2)){
							$test="true";
							echo "numéro du film : $film->NoFilm<br/>";
							echo "numéro d'exemplaire : $film->NoExemplaire<br/>";
							echo "Titre : $film->Titre<br/>";
							echo "Réalisateur : $film->Realisateur<br/>";
							echo "Date de l'emprunt : $film->DateEmpRes<br/>";
							echo "<br/><br/>";
						}
						if($test=="false"){
							//Nombre de cassettes détenues est nul
							echo "Vous n'avez pas loué de films<br/>";
						}
					}
				}
			}
			mysql_close($cnx);
		 ?>
		
	</body>
</html>
