<?php
	include('Outils.inc');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN" "http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>Descriptif d'un film</title>
		<link rel='stylesheet' media='screen' href='Deroule.css' />
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	</head>
	<body>
		<?php echo banniere('AccueilDescriptif.php', 'Yvan'); ?>
		<form method='get' action='Descriptif.php'>
			<label for='nuFilm'>Numéro du film</label>
			<input type='text' name='nuFilm' id='nuFilm' /><br/>
			<input type='submit' value='Rechercher' />
		</form>
	</body>
</html>
