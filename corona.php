<!DOCTYPE html>
<html>
<head>
	<title>Corono Fight</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="jumbotron text-center text-uppercase">
		<h1>Corona Fight</h1>
	</div>
	<form class="container col-md-4" action="corona.php" method="POST">
		<div class="form-group">
			<label>Enter State :</label>
			<input type="text" name="state" class="form-control">
		</div>
		<div class="form-group">
			<label>Enter District :</label>
			<input type="text" name="dist" class="form-control">
		</div>
		<div class="form-group text-center">
			<button type="submit" name="submit" class="btn btn-info">Get Detailes</button>
		</div>
	</form>

</body>
</html>
<?php

$data = file_get_contents("https://api.covid19india.org/state_district_wise.json");

$corona = json_decode($data ,true);

if(isset($_POST["submit"])){

	$state = $_POST["state"];
	$dist = $_POST["dist"];

	$state = ucfirst($state);
	$dist = ucfirst($dist);


?>

<div class="container col-md-4 m-auto text-center">
	


<?php
	echo "active :";
	echo($corona[$state]['districtData'][$dist]['active']);
	echo "<br>confirmed :";
	echo($corona[$state]['districtData'][$dist]['confirmed']);
	echo "<br>Death :";
	echo($corona[$state]['districtData'][$dist]['deceased']);
	echo "<br>Recovered :";
	echo($corona[$state]['districtData'][$dist]['recovered']);


}



?>
</div>