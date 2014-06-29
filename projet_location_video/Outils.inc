<?php
	function banniere($page, $auteurs){
		$Accueil = "<li><a href='Accueil.php'>Page d'acceuil du site</a></li>\n";
		$AccueilDescriptif = "<li><a href='AccueilDescriptif.php'>Descriptif d'un film</a></li>\n";
		$AccueilRecherche = "<li><a href='AccueilRecherche.php'>Recherche de films</a></li>\n";
		$IdentificationC = "<li><a href='IdentificationC.php'>Commande de cassettes</a></li>\n";
		$IdentificationD = "<li><a href='IdentificationD.php'>Liste des cassettes détenues</a></li>\n";
		
		echo "<hr/>\n<p align='center'><font size='8'>VideoEXPRESS<br/></font></p><p align='right'>&copy $auteurs</p>\n";
		switch($page){
			case('Accueil.php'):
				echo "<div id='menu'>\n<ul>\n".$AccueilDescriptif, $AccueilRecherche, $IdentificationC, $IdentificationD, "</ul>\n</div>\n";
				break;
			case('AccueilDescriptif.php'):
				echo "<div id='menu'>\n<ul>\n".$Accueil, $AccueilRecherche, $IdentificationC, $IdentificationD, "</ul>\n</div>\n";
				break;
			case('AccueilRecherche.php'):
				echo "<div id='menu'>\n<ul>\n".$Accueil, $AccueilDescriptif, $IdentificationC, $IdentificationD ,"</ul>\n</div>\n";
				break;
			case('IdentificationC.php'):
				echo "<div id='menu'>\n<ul>\n".$Accueil, $AccueilDescriptif, $AccueilRecherche, $IdentificationD,"</ul>\n</div>\n";
				break;
			case('IdentificationD.php'):
				echo "<div id='menu'>\n<ul>\n".$Accueil, $AccueilDescriptif, $AccueilRecherche, $IdentificationC,"</ul>\n</div>\n";
				break;
		}
		echo "<hr/>\n";
	}
	
	function DB_connect(){
		/* Demande de connexion au serveur mysql */
		$cnx = mysql_pconnect("localhost", "video25", "7616");
		if($cnx == 0){
			echo "Connexion au serveur impossible\n";
			exit();
		}
		/* Connexion à la base */
		if(mysql_select_db('video25', $cnx) == 0){
			echo "Acces à la base video25 impossible\n";
			echo mysql_error($cnx);
			exit();
		}
		return $cnx;
	}
	
	function DB_execSQL($req, $serv){
		$resultat = mysql_query($req, $serv);
		if ($resultat == 0){
			echo "Erreur rencontrée : " .mysql_error($serv);
			return 0;
		}else {
			return $resultat;
		}
	}
?>
