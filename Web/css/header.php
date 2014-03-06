<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $pageTitle; ?></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Condiment' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>

	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script>
	$(function() {
		$( document ).tooltip();
	});
	</script>
</head>

<body>
	<!-- Page navigation menu -->
	<nav id="navbar">
		<ul>
			<li><img id="logoImg" src="img/taco_truck_logo.png" alt="Logo"></li>
			<li class="select"><a>Menu</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="locations.php">Locations</a></li>
			<li id="accountLink"><a href="account.php">Sign In/Create Account</a></li>
		</ul>
	</nav>
	<div id="navSpace"></div>
