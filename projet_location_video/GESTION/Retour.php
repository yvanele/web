<?php
	include('../Outils.inc');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN" 
	"http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>Retour de films</title>
		<link rel='stylesheet' media='screen' href='../Deroule.css' />
	</head>
	<body>
		<?php 
			$cnx = DB_connect();
			if($cnx == 0){
				echo "?></body></html>";
				exit();
			}
			
			if($_POST['nuFilm']=="" OR $_POST['nuExemplaire']==""){
				echo "veulliez indiquer un numero de film et numero d'exemplaire<br/>";
				echo "<a href='javascript:history.back()'>retour a la page d'enregistrement</a>";
			}else{
				//Mise à jour de la colonne Statut de la table CASSETTES pour la cassette concernée
				$req1 = "UPDATE CASSETTES SET CASSETTES.Statut = 'disponible' WHERE NoFilm='".$_POST['nuFilm']."' AND NoExemplaire='".$_POST['nuExemplaire']."'";
				
				//Mise à jour de la colonne NbCassettes de la table ABONNES
				$req2 = "SELECT NbCassettes,Nom,Prenom,Code FROM ABONNES,EMPRES,CASSETTES WHERE ABONNES.Code=EMPRES.CodeAbonne AND EMPRES.NoFilm='".$_POST['nuFilm']."' AND CASSETTES.NoFilm='".$_POST['nuFilm']."' AND EMPRES.NoExemplaire='".$_POST['nuExemplaire']."' AND CASSETTES.Statut='empruntee'";
				
				//Recherche d'une cassette empruntée
				//Récupération du Code de l'abonné
				$resultat2 = DB_execSQL($req2, $cnx);
				if($resultat2 != ""){
					if($Info=mysql_fetch_array($resultat2)){
						$NbC = $Info['NbCassettes'];
						$NomA = $Info['Nom'];
						$PrenomA = $Info['Prenom'];
						$CodeA = $Info['Code'];
					}else{
						echo "Cette cassette n'a pas ete empruntée<br/>";
						echo "<a href='javascript:history.go(-1)' >Retour vers la page précédente</a>";
						echo "</body></html>";
						exit();
					}
				}else{
					echo "</body></html>";
					exit();
				}
				
				$NbC--; //NbCassettes = NbCassettes - 1
				$req3 = "UPDATE ABONNES SET ABONNES.NbCassettes='".$NbC."' WHERE ABONNES.Code='".$CodeA."'";
				
				//Suppression de la ligne confirmée dans la table EMPRES
				$req4 = "DELETE FROM EMPRES WHERE NoFilm='".$_POST['nuFilm']."' AND NoExemplaire='".$_POST['nuExemplaire']."' AND CodeAbonne='".$CodeA."'";
			
				$resultat1 = DB_execSQL($req1, $cnx);
				$resultat3 = DB_execSQL($req3, $cnx);
				$resultat4 = DB_execSQL($req4, $cnx);
			
				if($resultat1==0 OR $resultat3==0 OR $resultat4==0){
					echo "La mise à jour n'a pas été effectuée !";
					echo "</body></html>";
					exit();
				}else{
					echo "Retour de cassette effectué avec succès !";
					echo "<br/><b>Abonné :</b> $NomA $PrenomA";
					echo "<br/><b>Code Abonné :</b> $CodeA";
					echo "<br/><b>Nombre de cassettes maintenant détenues :</b> $NbC";
				}
			}
			mysql_close($cnx);
		?>
	</body>
</html>
