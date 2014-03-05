<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Taco Truck!</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Condiment' rel='stylesheet' type='text/css'>

</head>
<body>
	<!-- Page navigation menu -->
	<nav id="navbar">
		<ul>
			<li><img id="logoImg" src="img/taco_truck_logo.png" alt="Logo" title="Logo"></li>
			<li class="select"><a>Order</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="locations.php">Locations</a></li>
			<li id="accountLink"><a href="account.php">Sign In/Create Account</a></li>
		</ul>
	</nav>
	<div id="navSpace"></div>

	<!-- Order Pane -->
	<div class="orderPane">
		<h2 id="order">Order </h2>
		<!-- List of tacos in order -->
		<ul>
			<li>Taco 1: $0.00<img class="cancelButton" src="img/cancel_icon.png" alt="Cancel" title="Cancel"></li>
			<li>Taco 3: $0.00<img class="cancelButton" src="img/cancel_icon.png" alt="Cancel" title="Cancel"></li>
			<li>Custom Taco 1: $0.00<img class="cancelButton" src="img/cancel_icon.png" alt="Cancel" title="Cancel"></li>
		</ul>
		<!-- Tax and total -->
		<ul>
			<li id="taxTotal">Tax: $0.00</li>
			<li id="grandTotal">Grand Total: $0.00</li>
		</ul>
		<input type="submit" id="submitOrder" value="Check Out"/>
	</div>


	<!-- Table for menu -->
	<div class="menuPane">
		<h2>Menu</h2>
		<table id="menuTable">
			<tr class="tacoRow">
				<td><img src="img/taco_icon.png" alt="Taco 1"></td>
				<td><img src="img/taco_icon.png" alt="Taco 2"></td>
				<td><img src="img/taco_icon.png" alt="Taco 3"></td>
				<td><img src="img/taco_icon.png" alt="Taco 4"></td>
			</tr>
			<tr>
				<td>Taco 1</td>
				<td>Taco 2</td>
				<td>Taco 3</td>
				<td>Taco 4</td>
			</tr>
			<tr class="tacoRow">
				<td><img src="img/taco_icon.png" alt="Taco 5"></td>
				<td><img src="img/taco_icon.png" alt="Taco 6"></td>
				<td><img src="img/taco_icon.png" alt="Taco 7"></td>
				<td><img src="img/taco_icon.png" alt="Taco 8"></td>
			</tr>
			<tr>
				<td>Taco 5</td>
				<td>Taco 6</td>
				<td>Taco 7</td>
				<td>Taco 8</td>
			</tr>
		</table>
		<table>
			<tr class="tacoRow">
				<td id="customTaco"><img src="img/plus_icon.png" alt="Custom Taco"></td>
				<td id="previousTaco"><img src="img/previous_icon.png" alt="Previous Taco"></td>
			</tr>
			<tr>
				<td>Custom Taco</td>
				<td>Previous Taco</td>
			</tr>
		</table>
	</div>

	<script src="js/main.js"></script>
</body>
</html>
