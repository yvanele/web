<?php
	include('Outils.inc');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN" "http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>Identification</title>
		<!-- <link rel='stylesheet' media='screen' href='Deroule.css' /> -->
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	</head>
	<body>
		<?php
			echo banniere('IdentificationC.php', 'Yvan');
			
			$cnx = DB_connect();
			if($cnx==0){
				echo "</body>\n</html>";
				exit();
			}
			
			$requete1="SELECT ABONNES.Code FROM ABONNES WHERE ABONNES.Code='".$_POST['pass']."' AND ABONNES.Nom='".$_POST['nom']."'";
			
			$resultat1 = DB_execSQL($requete1,$cnx);
			
			if($resultat1!=0){
				if(!($abonne = mysql_fetch_object($resultat1))){
					echo "Le nom et le code soumis ne sont pas enregistrés dans la base de donnée<br/>";
					echo "<a href='javascript:history.back()'>Retour à la page d'enregistrement</a>";
					echo "</body></html>";
					exit(); 
				}
			}
			
			$requete2="SELECT ABONNES.NbCassettes FROM ABONNES WHERE ABONNES.Code='".$_POST['pass']."'";
			$resultat2=DB_execSQL($requete2,$cnx);
			if($resultat2!=0){
				if($abonne=mysql_fetch_object($resultat2)){
					$NbC=3-($abonne->NbCassettes);
				}
			}
			if($NbC>0){
				//Affichage du nombre maximum de cassettes que l'abonné peut commander
				echo "Vous pouvez commander jusqu'à $NbC films<br/>";
				
				echo "<form method='post' action='ConfirmeCommande.php'>\n";
				echo "<table>\n<tr><th>Numéro de film</th><th>Choix du support</th></tr>\n";
					for($i=1; $i<=$NbC; $i++){
						echo "<tr>\n<td>\n";
						echo "<label for='NumFilm".$i."'>Numéro du film</label>\n<input type='text' id='NumFilm".$i."' name='NumFilm".$i."'/>\n";
						echo "</td>\n<td>\n";
						echo "<label for='DVD".$i."'>DVD</label>\n<input type='radio' id='DVD".$i."' value='DVD' name='Support".$i."'/>\n";
						echo "<label for='VHS".$i."'>VHS</label>\n<input type='radio' id='VHS".$i."' value='VHS' name='Support".$i."'/>\n";
						echo "</td>\n</tr>\n";
					}
				echo "<br/><tr><td><label for='pass'>Code</label>\n<input type='password' id='pass' name='pass'/></td>\n";
				echo "<td><input type='submit' name='Commander' value='Commander'/>\n</td></tr>\n";
				echo "</table>\n</form>\n";
			}
			else{
				echo "Vous ne pouvez plus commander de films";
			}
			mysql_close($cnx);
		?>
	</body>
</html>
