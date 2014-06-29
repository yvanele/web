<?php
	include('Outils.inc');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN" "http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>Identification</title>
		<link rel='stylesheet' media='screen' href='Deroule.css' />
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	</head>
	<body>
		<?php echo banniere('IdentificationD.php', 'Yvan'); ?>
		<form method='post' action='Detenues.php'>
			<label for='nom'>Nom d'abonné :</label>
			<input type='text' name='nom' id='nom' /><br/>
			<label for='pass'>Code :</label>
			<input type='text' name='pass' id='pass' /><br/>
			<input type='submit' value='Valider' />
		</form>
	</body>
</html>
