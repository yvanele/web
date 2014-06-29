<?php
	include('Outils.inc');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN" "http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>Recherche de films</title>
		<link rel='stylesheet' media='screen' href='Deroule.css' />
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	</head>
	<body>
		<?php 
			echo banniere('AccueilRecherche.php', 'Yvan');
			$cnx = DB_connect();
			
			if($cnx==0){
				echo "</body>\n</html>";
				exit();
			}
		?>
		<h1>Résultats de la recherche</h1>
		<?php 
			/*if(!isset($_POST['nuFilm']))
				echo "Ce numéro de film n'existe pas !<br/>";*/
			
			$condition = "";
			$table = "";

			if($_POST['motCle']!=""){
				$test="";
				$titre=explode(" ",$_POST['motCle']);
				foreach($titre as $k=>$v){
					if($test==""){
						$test.="(FILMS.Titre LIKE '%$v%'";
					}else{
						$test.=" OR FILMS.Titre LIKE '%$v%'";
					}
				}
				$test.=")";
		
				if($condition==""){
					$condition.=$test;
				}else{
					$condition.=" and ".$test;
				}
			}
			
			if($_POST['support']!="Indifférent"){
				if($condition==""){
					$condition.=" FILMS.NoFilm = CASSETTES.NoFilm AND CASSETTES.Support = '".$_POST['support']."'";
				}else{
					$condition.=" AND FILMS.NoFilm=CASSETTES.NoFilm AND CASSETTES.Support = '".$_POST['support']."'";
				}
			}
			
			if($_POST['support']!="Indifférent"){
				if($_POST['disponibilite']!="Indifférent"){
					if($condition==""){
						$condition.=" CASSETTES.Statut='".$_POST['disponibilite']."'";
					}else{
						$condition.=" and CASSETTES.Statut='".$_POST['disponibilite']."'";
					}
				}
			}else{
				if($_POST['disponibilite']!="Indifférent"){
					if($condition==""){
						$condition.=" FILMS.NoFilm=CASSETTES.NoFilm and CASSETTES.Statut='".$_POST['disponibilite']."'";
					}else{
						$condition.=" and  FILMS.NoFilm=CASSETTES.NoFilm and CASSETTES.Statut='".$_POST['disponibilite']."'";
					}
				}
			}
			
			if($_POST['genre']!="Indifférent"){
				if($condition==""){
					$condition.=" FILMS.Genre='".$_POST['genre']."'";
				}else{
					$condition.=" and FILMS.Genre='".$_POST['genre']."'";
				}
			}
			
			if($_POST['realisateur']!="Indifférent"){
				if($condition==""){
					$condition.=" FILMS.Realisateur='".$_POST['realisateur']."'";
				}else{
					$condition.=" and FILMS.Realisateur='".$_POST['realisateur']."'";
				}
			}
			
			if($_POST['acteur']!="Indifférent"){
				if($condition==""){
					$condition .= "FILMS.NoFilm = ACTEURS.NoFilm AND ACTEURS.Acteur = '".$_POST['acteur']."'";
				}else{
					$condition .= " AND FILMS.NoFilm = ACTEURS.NoFilm AND ACTEURS.Acteur = '".$_POST['acteur']."'";
				}
			}
			
			if($_POST['motCle']!="" or $_POST['disponibilite']!="Indifférent" or $_POST['support']!="Indifférent" or $_POST['acteur']!="Indifférent" or $_POST['realisateur']!="Indifférent" or $_POST['genre']!="Indifférent"){
				$table.="FILMS";
			}
			if($_POST['disponibilite']!="Indifférent" or $_POST['support']!="Indifférent"){
				$table.=",CASSETTES";
			}
			if($_POST['acteur']!="Indifférent"){
				$table.=",ACTEURS";
			}
			
			if($table!=""){				
					$resultat=DB_execSQL("SELECT FILMS.NoFilm, FILMS.Titre FROM $table WHERE $condition", $cnx);
			}else{
					$resultat=DB_execSQL("SELECT FILMS.NoFilm, FILMS.Titre FROM FILMS", $cnx);
			}
				
			if($resultat!=0){
				$verif = mysql_num_rows($resultat);
				//echo $condition."<br/>";
				echo "Nombre de résultats : " .$verif ."<br/>";
				//echo $_POST['acteur'];
				while($film=mysql_fetch_object($resultat)){
					echo "Numéro du film : $film->NoFilm |"." Titre : $film->Titre<br/> ";
				}
			}
			mysql_close($cnx);
		?>
	</body>
</html>
