<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Account</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Swanky+and+Moo+Moo' rel='stylesheet' type='text/css'>
</head>
<body>
	<!-- Page navigation menu -->
	<nav id="navbar">
		<ul>
			<li><img id="logoImg" src="img/taco_truck_logo.png" alt="Logo" title="Logo"></li>
			<li><a href="index.html">Order</a></li>
			<li><a href="about.html">About</a></li>
			<li><a href="locations.html">Locations</a></li>
			<li id="accountLink" class="select"><a>Sign In/Create Account</a></li>
		</ul>
	</nav>
	<div id="navSpace"></div>
	<div id="navSpace"></div>

	<div class="accountForm">
		<div id="signInPane">
			<form class="userForm">
				<input class="userInput" type="text" name="email" placeholder="Email"><br>
				<input class="userInput" type="password" name="password" placeholder="Password"><br>
				<input class="userInput" type="submit" value="Sign In">
			</form>
		</div>

		<div id="createAccountPane">
			<form class="userForm">
				<input class="userInput" type="text" name="firstname" placeholder="First Name"><br>
				<input class="userInput" type="text" name="lastname" placeholder="Last Name"><br>
				<input class="userInput" type="email" name="email" placeholder="Email"><br>
				<input class="userInput" type="password" name="password" placeholder="Password"><br>
				<input class="userInput" type="password" name="password" placeholder="Confirm Password"><br>
				<select class="userInput" name = "ccprovider">
					<option value="mastercard">Master Card</option>
					<option value="amx">American Express</option>
					<option value="visa">Visa</option>
				</select><br>
				<input class="userInput" type="text" name="ccnumber" placeholder="Credit Card Number"><br>
				<input class="userInput" type="submit" value="Sign In">
			</form>
		</div>
	</div>

	<script src="js/main.js"></script>
</body>
</html>