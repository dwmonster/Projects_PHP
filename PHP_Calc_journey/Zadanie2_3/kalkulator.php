<!DOCTYPE html>
<html lang="pl">
<head>
<title>Strona PHP</title>
<link rel="stylesheet" href="style.css">
<meta charset="utf-8">
</head>
<body>
<?php
	$page_title = "Kalkulator kosztów podróży";
	function create_fuel_radio($value, $name="fuel-price"){
	if ($value==5.12){
		echo '<input type="radio" name="' . $name . '" value="' . $value . '" checked>' . $value;
		}
	else {
		echo '<input type="radio" name="' . $name . '" value="' . $value . '" >' . $value;
		}
	}
	
	include('naglowek.html');
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	if(isset($_POST['distance'],$_POST['fuel-price'], $_POST['efficiency']) && is_numeric($_POST['distance']) &&
	is_numeric($_POST['fuel-price']) && is_numeric($_POST['efficiency'])){
	
	$litr = $_POST['distance']/$_POST['efficiency'];
	$koszt=$litr * $_POST['fuel-price'];
	$hours=$_POST['distance']/75;
	
	echo "<div class='pageHeader'><h1> Szacunkowy koszt całkowity</h1></div><p>Całkowity koszt przejechania " .
	$_POST['distance'] . " kilometrów, przy średnim zużyciu " . $_POST['efficiency'] . " kilometrów na litr i przy
	średniej cenie " . $_POST['fuel-price'] . " zł za litr wynosi " . number_format($koszt, 2) . " zł. </p>
	<p> Gdybyś jechał z prędkością 75 kilometrów na godzinę, podóż zajęłaby około " . number_format($hours, 2) .
	" godzin. </p>";
	}
	else {
		echo "<div class='pageHeader'><h1>BŁĄD! </h1> </div> <p style='color: red;'> 
		Proszę prawidłowo wybrać cenę paliwa i jego zużycie.</p>";
		}
		}
?>

<div class="pageHeader"> <h1> Kalkulator kosztów podróży </h1> </div>
<form action="kalkulator.php" method="post">
<p> Dystand w kilometrach: <input type="number" name="distance"> </p>
<p> Średnia cena za litr paliwa :
<?php

	create_fuel_radio('5.12');
	create_fuel_radio('5.14');
	create_fuel_radio('5.16');
	?>
</p>

<p> Zużycie paliwa: <select name="efficiency">
	<option value = "12.5"> Duże </option>
	<option value = "14.2" selected> Przeciętne</option>
	<option value = "16.6"> Niskie </option>
	<option value = "20" > Rewelacyjne</option>
	</select></p>
	<p> <input type="submit" name="submit" value="Oblicz"></p>
	</form>
	
<?php include ('stopka.html'); ?>