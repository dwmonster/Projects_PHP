<?php
	function mojemenu($nazwapliku){
		echo "\n\n<table id='menu'>";
		$tmpplik = file($nazwapliku);
		$tmpcount = count($tmpplik);
		
		for ($i=0; $i<$tmpcount;$i++)
		{
			$opcje = explode('*', trim($tmpplik[$i]));
			echo "\n<tr>";
			echo"\n<td>";
			echo "<a href=" . $opcje[1] . ">" . $opcje[0] . "</a>";
			echo "</td>";
			echo "</tr>";
		}
		echo "\n</table>\n";
}
?>		