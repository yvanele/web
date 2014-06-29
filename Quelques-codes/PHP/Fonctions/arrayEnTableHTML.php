<?php
	function arrayEnTableHTML($tableau){
		$res='';
		foreach($tableau as $k=>$v){
			$res.="<tr><td>".htmlspecialchars($k)."</td>
			           <td>".htmlspecialchars($v)."</td>
			      </tr>";
		}
		return "<table><caption>Descriptif</caption>
					<tr><th>Index</th><th>Valeur</th></tr>
					$res";
			   "</table> \n";
	}
?>
