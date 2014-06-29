<?php
	include('Outils.inc');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN" "http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Recherche de films</title>
		<link rel='stylesheet' media='screen' href='deroule.css' />
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	</head>
	<body>
		<?php 
			echo banniere('AccueilDescriptif.php', 'Yvan');
			$cnx = DB_connect();
			if($cnx==0){
				echo "</body>\n</html>";
				exit();
			}
			
			$req1 = "SELECT * FROM FILMS WHERE FILMS.NoFilm = '".$_GET['nuFilm']."'";
			$req2 = "SELECT ACTEURS.Acteur FROM ACTEURS WHERE ACTEURS.NoFilm = '".$_GET['nuFilm']."'";
		?>
		<h1>Descriptif du film</h1>
			<?php			
				$resultat = DB_execSQL($req1, $cnx);
				
				while ($film = mysql_fetch_object($resultat)){
					
				/*if(!$film){
					echo "Ce film n'existe pas dans la base !<br/>\n";
					echo "<a href='javascript:history.go(-1)' >Retour à la page précédente</a>";
				}*/
				//$verif = mysql_num_rows($resultat);
					
					echo "Numéro du film : $film->NoFilm<br/>\n"
						."Titre : $film->Titre<br/>\n"
						."Nationalite : $film->Nationalite<br/>\n"
						."Realisateur : $film->Realisateur<br/>\n"
						."Année de production : $film->Annee<br/>\n"
						."Couleur : $film->Couleur<br/>\n"
						."Duree : $film->Duree minutes<br/>\n"
						."Synopsis : $film->Synopsis<br/>\n"
						."Genre : $film->Genre<br/>\n"
						."Titre : $film->Titre<br/>\n";
						echo "Acteur : ";
				}
			?>
			<?php
				$resultat2 = DB_execSQL($req2, $cnx);
				while ($acteur = mysql_fetch_object($resultat2)){
					echo "$acteur->Acteur ";
				}
				mysql_close($cnx);
			?>
	</body>
</html>
