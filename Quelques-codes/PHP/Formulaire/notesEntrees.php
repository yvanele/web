<?php
	error_reporting(E_ALL);
	include('entete.php');
	include 'arrayEnTableHTML.php';
	echo DOCTYPE_XHTML_BASIC_11, "\n",
	     HTML_FR, "\n",
	     '<head>', "\n",
	     META_TYPE_TEXT_UTF8, "\n",
	     "<title>Question 3</title> \n",
	     "</head> \n", "<body> \n";
	     
	    echo "<h1></h1>", arrayEnTableHTML($_POST);
	    
		echo "</body></html>";	
?>
