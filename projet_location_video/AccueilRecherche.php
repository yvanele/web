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
			echo banniere('AccueilRecherche.php', 'Yvan');
			$cnx = DB_connect();
			$req1 = "SHOW COLUMNS FROM FILMS LIKE 'Genre'";
			$req2 = "SELECT DISTINCT Realisateur FROM FILMS ORDER BY realisateur";
			$req3 = "SELECT DISTINCT Acteur FROM ACTEURS ORDER BY Acteur";
		?>
		<h1>Recherche de films</h1>
		<form action="Recherche.php" method="post">
			<div>
				<label for="motCle">Mots-clés : </label>
				<input type="text" name="motCle" id="motCle" /><br/>
				<label for="support">Support</label>
				<select name="support" id="support">
					<option value="Indifférent">Indifférent</option>
					<option value="DVD">DVD</option>
					<option value="VHS">VHS</option>
				</select><br/>
				<label for="disponibilite">Disponibilité</label>
				<select name="disponibilite" id="disponibilite">
					<option value="Indifférent">Indifférent</option>
					<option value="Disponible">Disponible</option>
				</select><br/>
				<label for="genre">Genre</label>
				<select name="genre" id="genre">
					<option value="Indifférent">Indifférent</option>
					<?php
						$resultat = DB_execSQL($req1, $cnx);
						while ($genre = mysql_fetch_object($resultat)){
							// Ici avec le paramètre "5" je retire le début de la chaine -> enum( 
							// Et avec le paramètre "-1" je retire la fin de la chaine    -> )
							$enum = substr($genre->Type, 5, -1);
							// Je coupe la chaine chaque fois que je rencontre une virgule.
							$enum = explode(",", $enum);
							/*for($i=0; $i<count($enum); $i++) {
								$ma_chaine = $enum[$i];
								$ma_chaine = substr($ma_chaine, 1, -1);
								echo "<option value='".$ma_chaine."'>$ma_chaine</option>\n";
							}*/
							foreach ($enum as $v){
								$ma_chaine = $v;
								$ma_chaine = substr($ma_chaine, 1, -1);
								echo "<option value='".$ma_chaine."'>$ma_chaine</option>\n";
							}
						}
					?>
				</select><br/>
				<label for="realisateur">Realisateur</label>
				<select name="realisateur" id="realisateur">
					<option value="Indifférent">Indifférent</option>
					<?php
						$resultat = DB_execSQL($req2, $cnx);
						while ($real = mysql_fetch_object($resultat)){
							echo "<option value='".$real->Realisateur."'>$real->Realisateur</option>\n";
						}
					?>
				</select><br/>
				<label for="acteur">Acteur</label>
				<select name="acteur" id="acteur">
					<option value="Indifférent">Indifférent</option>
					<?php
						$resultat = DB_execSQL($req3, $cnx);
						while ($acteur = mysql_fetch_object($resultat)){
							echo "<option value='".$acteur->Acteur."'>$acteur->Acteur</option>\n";
						}
						mysql_close($cnx);
					?>
				</select><br/>
				<input type='submit' value='Rechercher' />
			</div>
		</form>
	</body>
</html>
