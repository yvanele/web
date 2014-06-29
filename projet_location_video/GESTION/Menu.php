<?php
	include('../Outils.inc');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN" 
	"http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>Page d'authentification</title>
		<link rel='stylesheet' media='screen' href='../Deroule.css' />
		<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
	</head>
	<body>
		<?php //echo banniere('Accueil.php', 'Yvan'); ?>
			<hr/>
				<p align='center'><font size='8'>VideoEXPRESS<br/></font></p>
				<p align='right'>&copy Yvan</p>
			<hr/>
		<?php
			$ADMIN = array('video25'=>'7616');
			foreach($ADMIN as $k => $v){
				if (($k == $_POST['nomA']) AND (($v == $_POST['mdpA']))){
					echo 'Bonjour !';
					?>
					<ul>
						<li><a href='AccueilRetour.php'>Retour de cassettes</a></li>
						<li><a href='AccueilDescriptif.php'>Enregistrer de nouveaux abonnés</a></li>
						<li><a href='AccueilRecherche.php'>Modifier des fiches d'abonnés</a></li>
						<li><a href='IdentificationC.php'>Radier des abonnés</a></li>
					</ul>
					<?php
				}
				else{
					echo 'Echec de l\'authentification ! Veuillez recommencer';
					?>
					<form method="post" action="AccueilRetour.php">
						<input type="button" value="Retour" onclick="javascript:history.go(-1)" />
					</form>
					<a href="javascript:history.go(-1)" >Retour</a>
					<?php
				}
			}
		?>
	</body>
</html>
