<?php

$json_data = file_get_contents('resources/taco_truck_locations.json');
$var = json_decode($json_data, true);

$sections = "";

foreach ($var as $location) {
	$sections = $sections . "<section class=\"location\">
					<h1>".$location['name']."</h1>
					<p>".$location['address']."<br/>".$location['city'].", ".$location['state']." ".$location['zipcode']."</p>
				  </section>";
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" name="viewport" content="initial-scale=1.0, user-scalable=no"/>
	<title>Locations</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Condiment' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
	
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?&amp;sensor=false"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/locations.js"></script>
 
</head>
<body>
	<!-- Page navigation menu -->
	<nav id="navbar">
		<ul>
			<li><img id="logoImg" src="img/taco_truck_logo.png" alt="Logo" title="Logo"></li>
			<li><a href="index.php">Menu</a></li>
			<li><a href="about.php">About</a></li>
			<li class="select"><a>Locations</a></li>
			<li id="accountLink"><a href="account.php">Sign In/Create Account</a></li>
		</ul>
	</nav>
	<div id="navSpace"></div>

	<article id="locations">
		<?php echo $sections; ?>
	</article>
	<div id="map-canvas" class="boxShadow"></div>

	<script src="js/main.js"></script>
</body>
</html>
