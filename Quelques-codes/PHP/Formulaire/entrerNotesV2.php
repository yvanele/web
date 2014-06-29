<?php
	error_reporting(E_ALL);
	include 'entete.php';
	echo DOCTYPE_XHTML_BASIC_11, "\n",
		 HTML_FR, "\n", "<head> \n",
		 META_TYPE_TEXT_HTML_UTF8,
		 "<title>Envoi controlé du numéro</title> \n",
		 "</head> \n <body> \n";
		
	define('NUM_G', '8');
	
	function arrayEnTableHTML($t){
$r = "<tr><th>Clef</th><th>Valeur</th></tr>\n";
foreach ($t as $k => $v){
$r .= "<tr><td>$k</td><td>"
. htmlspecialchars($v)
. "</td></tr>\n";
}
return "\n<table>\n$r</table>\n";
}
	
	function creerForm($nume='') {
		$form='';
		$form .= "<form action='entrerNotesv2.php' method='get'>\n";
		$form .=  "<fieldset>\n";
		$form .= "<label>Numero de groupe : </label>\n";
		$form .= "<input type='text' name='num' value='$nume' />\n";
		$form .= "<input type='submit' />\n";
		$form .= "</fieldset></form>\n";
		return $form;
	}
	
	if (empty($_GET)) {
		echo creerForm();
	}else {
		if(isset($_GET['num'])){
			if($_GET['num'] > NUM_G){
				echo "<div>Trop grand !</div>";
				echo creerForm();
			}
			else if ($_GET['num'] == ''){
				echo "<div>Non rempli !</div>";
				echo creerForm();
			}
			else{
				echo "<div>OK !</div>\n";
				echo "<div>Entrez le nombre d'etudiant :</div>";
				echo "<form method='post' action =''>
					  <fieldset>
					  <label>Etudiant</label>
						  <input name='nb_etu' type='text' />
						  <input type='submit' value ='Valider' />
					  </fieldset></form>\n";
				
				if(isset($_POST['nb_etu'])){
					echo "<div>Entrez les noms ainsi que les notes des etudiants :</div>";
					echo "<form method='post' action='' ><fieldset>
						  <table><caption>Saisie du nom et des notes des etudiants</caption>
						  <tr><th>Etudiant</th><th>Note</th></tr>";
						  for($i=0; $i<$_POST['nb_etu']; $i++){
							  echo '<tr><td><input type="text" name="nom" /></td>
									    <td><input type="text" name="note" /></td></tr>';
						  }
					echo "</table>
						  <input type='submit' value='Valider' />
					      </fieldset></form>";
					
					echo "<h1>$_GET</h1>", arrayEnTableHTML($_GET);
	     			echo "<h2>$_POST</h2>", arrayEnTableHTML($_POST);
				}
			}
		}
	}
?>
</body></html>
