<?php
	error_reporting(E_ALL);
	include('entete.php');
	echo DOCTYPE_XHTML_BASIC_11, "\n",
	     HTML_FR, "\n",
	     '<head>', "\n",
	     META_TYPE_TEXT_UTF8, "\n",
	     "<title>MultNxN</title> \n",
	     "</head> \n", "<body> \n";
?>
<table><caption>Multiplication</caption>
	<tr><th>Operande</th><th>Resultat</th></tr>
	<?php
		for($i=0; $i<10; $i++){
			  echo "<tr><td>", $i, "</td><td>", $i*4, "</td></tr> \n";
		}
	?>
</table></body></html>
