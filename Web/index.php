<?php

require_once '../database/login.php';
$db = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if($db->connect_errno > 0){
	die('Unable to connect to database [' . $db->connect_error . ']');
}

//Get menu data
$query = "SELECT TacoFixings.name FROM TacoFixings WHERE TacoFixings.itemType='Type'";
$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
while($row = $result->fetch_row()) {
  	$tacoTypes = $tacoTypes . "$row[0]<br />";
}

$query = "SELECT TacoFixings.name FROM TacoFixings WHERE TacoFixings.itemType='Tortillas'";
$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
while($row = $result->fetch_row()) {
  	$tacoTortillas = $tacoTortillas . "$row[0]<br />";
}

$query = "SELECT TacoFixings.name FROM TacoFixings WHERE TacoFixings.itemType='Rice'";
$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
while($row = $result->fetch_row()) {
  	$tacoRice = $tacoRice . "$row[0]<br />";
}

$query = "SELECT TacoFixings.name FROM TacoFixings WHERE TacoFixings.itemType='Cheese'";
$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
while($row = $result->fetch_row()) {
  	$tacoCheese = $tacoCheese . "$row[0]<br />";
}

$query = "SELECT TacoFixings.name FROM TacoFixings WHERE TacoFixings.itemType='Beans'";
$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
while($row = $result->fetch_row()) {
  	$tacoBeans = $tacoBeans . "$row[0]<br />";
}

$query = "SELECT TacoFixings.name FROM TacoFixings WHERE TacoFixings.itemType='Sauces'";
$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
while($row = $result->fetch_row()) {
  	$tacoSauces = $tacoSauces . "$row[0]<br />";
}

$query = "SELECT TacoFixings.name FROM TacoFixings WHERE TacoFixings.itemType='Vegetables'";
$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
while($row = $result->fetch_row()) {
  	$tacoVeggies = $tacoVeggies . "$row[0]<br />";
}

$query = "SELECT TacoFixings.name FROM TacoFixings WHERE TacoFixings.itemType='Extras'";
$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
while($row = $result->fetch_row()) {
  	$tacoExtras = $tacoExtras . "$row[0]<br />";
}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Taco Truck!</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/accordion.css">
	<link href='http://fonts.googleapis.com/css?family=Swanky+and+Moo+Moo' rel='stylesheet' type='text/css'>

	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script src="js/jquery.js"></script>

	<script>
  $(function() {
    $( "#accordion" ).accordion({
      event: "click hoverintent"
    })
  });

  $(function() {
    $( document ).tooltip();
  });
  </script>

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
	<div id="orderPane">
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
	<div id="menuPane">
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
				<td id="customTaco"><img src="img/previous_icon.png" alt="Previous Taco"></td>
			</tr>
			<tr>
				<td id="customTaco">Custom Taco</td>
				<td id="customTaco">Previous Taco</td>
			</tr>
		</table>
	</div>
	
	<div id="ingredientsPane">
		<h2>Ingredients</h2>

		<div id="accordion">
			<h3>Types</h3>
			<div>
				<p>
					<?php echo $tacoTypes; ?>
				</p>
			</div>
			<h3>Tortillas</h3>
			<div>
				<p>
					<?php echo $tacoTortillas; ?>
				</p>
			</div>
			<h3>Rice</h3>
			<div>
				<p>
					<?php echo $tacoRice; ?>
				</p>
			</div>
			<h3>Cheese</h3>
			<div>
				<p>
					<?php echo $tacoCheese; ?>
				</p>
			</div>
			<h3>Beans</h3>
			<div>
				<p>
					<?php echo $tacoBeans; ?>
				</p>
			</div>
			<h3>Sauces</h3>
			<div>
				<p>
					<?php echo $tacoSauces; ?>
				</p>
			</div>
			<h3>Vegetables</h3>
			<div>
				<p>
					<?php echo $tacoVeggies; ?>
				</p>
			</div>
			<h3>Extras</h3>
			<div>
				<p>
					<?php echo $tacoExtras; ?>
				</p>
			</div>
		</div>

	</div>


	<script src="js/main.js"></script>
</body>
</html>
