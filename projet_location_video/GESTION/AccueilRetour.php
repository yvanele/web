<?php
	include('../Outils.inc');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN" 
	"http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>Retour de film</title>
		<link rel='stylesheet' media='screen' href='../Deroule.css' />
		<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
	</head>
	<body>
		<form method="post" action="Retour.php">
			<label for='nuFilm'>Numéro du film</label>
			<input type='text' name='nuFilm' id='nuFilm' /><br/>
			<label for='nuExemplaire'>Numéro d'exemplaire</label>
			<input type='text' name='nuExemplaire' id='nuExemplaire' /><br/>
			<input type='submit' value='Valider' />
		</form>
		<a href="javascript:history.go(-1)" >Retour vers la page précédente</a>
	</body>
</html>
