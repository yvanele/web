<?php
	error_reporting(E_ALL);
	include('entete.php');
	include'arrayEnTableHTML.php';
	echo DOCTYPE_XHTML_BASIC_11, "\n",
	     HTML_FR, "\n",
	     '<head>', "\n",
	     META_TYPE_TEXT_UTF8, "\n",
	     "<title>Question 3</title> \n",
	     "</head> \n", "<body> \n";
	define('NUM', '8');
	
	echo "<form method='get' action =''>
			<fieldset>
				<label for='numero'>Numero</label>
					<input name='numero' id='numero' />
					<input type='submit' value ='Valider' />
		</fieldset></form>";
	
	if(isset($_GET['numero'])){
		if($_GET['numero']==NULL) echo 'Veuillez renseigner votre groupe';
		elseif($_GET['numero']>NUM) echo 'Numero de groupe invalide. Veuillez recommencer';
		elseif($_GET['numero']<=NUM){
			echo 'Numero de groupe : ',$_GET['numero'], "<br>"
				.'Entrer le nombre d\'etudiants'
				."<form method='post' action =''>
							<fieldset>
								<label for='etudiant'>Etudiant</label>
									<input name='etudiant' id='etudiant' />
									<input type='submit' value ='Valider' />
				</fieldset></form>";
			if(isset($_POST['etudiant'])){?>
				<form method='post' action='notesEntrees.php' ><fieldset>
					<table><caption>Saisie du nom et des notes des etudiants</caption>
						<tr><th>Etudiant</th><th>Note</th></tr>
						<?php
							for($i=0; $i<$_POST['etudiant']; $i++){
								  echo '<tr><td>
									  		<input type="text" name="nom" id="nom" />
									  		</td>
									  		<td>
									  		<input type="text" name="note" id="note" />
									  		</td>
									  		</tr>';
							}
						?>
					</fieldset></table>
					<input type='submit' value='Valider' />
				</form><?php 
				echo "<h1>$_GET</h1>", arrayEnTableHTML($_GET);
	     		echo "<h2>$_POST</h2>", arrayEnTableHTML($_POST);
			}
			
		}
	}
	"</body></html>";
?>
