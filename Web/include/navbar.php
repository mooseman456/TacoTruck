<?php

if (isset($_SESSION['givenName'])) {
	$accountText = $_SESSION['givenName'].", Sign Out";
	echo "Signed in";
} else {
	$accountText = "Sign In/Create Account";
	echo "Signed out";
}

?>

<!-- Page navigation menu -->
<nav id="navbar">
	<ul>
		<li><img id="logoImg" src="img/taco_truck_logo.png" alt="Logo" title="Logo"></li>
		<li id="menuLink"><a href="index.php">Menu</a></li>
		<li id="aboutLink" ><a href="about.php">About</a></li>
		<li id="locationLink" ><a href="locations.php">Locations</a></li>
		<li id="accountLink"><a href="account.php"><?php echo $accountText; ?></a></li>
	</ul>
</nav>
<div id="navSpace"></div>
