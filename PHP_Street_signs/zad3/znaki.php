<!DOCTYPE HTML>
<html>
<head>
	<title> Znaki drogowe </title>
	<meta charset="utf-8">
	<style>
		#menu {width: 200px;}
		.znaki {width: 600px; padding 10px;}
		.img {width: 150px;}
		.opis {width: 450px;}
	</style>
	<link href="style.css" rel="stylesheet">
</head>
<body>

	<?php
		include('menuZnaki.php');
		
		//Domyślne - Informacyjne
		if(!isset($_GET['kat'])){
			$_GET['kat'] = 'informacyjne' ;
			}
			
	?>
	<table class="znaki">
	<tr >
		<td colspan="2" id="tytul"><h1><center> Znaki Drogowe </center> </h1></td>
		
	</tr>
	<tr>
		<td id="td_menu">
		
		<?php
			mojemenu('spis.txt')
			?>
		</td>
		<td>
			<table class="znaki znaki2">
			
			<?php
			
				$plik = file($_GET['kat'] . '.txt');
				$tmpcount = count($plik);
				
				for($i=0;$i<$tmpcount; $i++){
					$linia = explode('|', $plik[$i]);
					echo "\n<tr>";
					echo "<td class='img'><img src=znaki_drogowe/" . $linia[0] . "></td>\n";
					echo "<td class='opis'><p>" . trim($linia[1]) . "</p></td>\n";
					echo "</tr>\n";
				
				}
			
			?>
			</table>
		</td>
	</tr>
	</table>


</body>
</html>