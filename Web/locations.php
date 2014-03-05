<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" name="viewport" content="initial-scale=1.0, user-scalable=no"/>
	<title>Locations</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Condiment' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
	
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?&amp;sensor=false"></script>
    <script type="text/javascript" src="js/locations.js"></script>
 
</head>
<body>
	<!-- Page navigation menu -->
	<nav id="navbar">
		<ul>
			<li><img id="logoImg" src="img/taco_truck_logo.png" alt="Logo" title="Logo"></li>
			<li><a href="index.php">Order</a></li>
			<li><a href="about.php">About</a></li>
			<li class="select"><a>Locations</a></li>
			<li id="accountLink"><a href="account.php">Sign In/Create Account</a></li>
		</ul>
	</nav>
	<div id="navSpace"></div>

	<article id="locations">
		<section class="location">
			<h1>Klyde Warren Park</h1>
			<p>2012 Woodall Rogers Fwy<br>Dallas, TX 75201</p>
		</section>
		<section class="location">
			<h1>Southern Methodist University</h1>
			<p>3140 Dyer Street<br>Dallas, TX 75205</p>
		</section>
	</article>
	<div id="map-canvas"></div>

	<script src="js/main.js"></script>
</body>
</html>
