<!DOCTYPE HTML>
<html>
<head>
	<title> Firma XXX </title>
	<meta charset="utf-8">
	<style>
		hr { width: 20%; text-align: left; margin-left: 0;}
	</style>
</head>
<body>
	<h3> Pracownicy naszej firmy: </h3>
	<hr> 
	
<?php
$plik = file('pracownicy_dane.txt');
$tabcount = count($plik);
	for ($i=0;$i<$tabcount;$i++)
	{
		$wiersz = explode(',',$plik[$i]);
		echo $wiersz[1]." ".$wiersz[0]." - ".$wiersz[2]."<br>\n";
	}


?>

</body>
</html>