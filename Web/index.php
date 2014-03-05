<?php

require_once '../database/login.php';
$db = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if($db->connect_errno > 0){
	die('Unable to connect to database [' . $db->connect_error . ']');
}

//Menu Items JSON
if (($handle = fopen("../database/premade_tacos.json", "r")) !== FALSE) {
	
	$json = file_get_contents('../database/premade_tacos.json');
	$data = json_decode($json,true);
	$counter = 0;

	foreach ($data['PreMadeTacos'] as $taco) {
		$PreMadeTacos[$counter] = $taco;
		$PreMadeTacos[$counter]['ingredients'] = $PreMadeTacos[$counter]['type'].", ".$PreMadeTacos[$counter]['tortilla'].", ".
												 $PreMadeTacos[$counter]['rice'].", ".$PreMadeTacos[$counter]['cheese'].", ".
												 $PreMadeTacos[$counter]['beans'].", ".$PreMadeTacos[$counter]['sauces'].", ".
												 $PreMadeTacos[$counter]['vegetables'].", ".$PreMadeTacos[$counter]['extras'];
		//Remove trailing space and comma
		$PreMadeTacos[$counter]['ingredients'] = rtrim($PreMadeTacos[$counter]['ingredients'],', ');
		$counter++;
	}
}

// //Get Premade Tacos
// $query = "SELECT PreMadeTacos.tacoorder_id, PreMadeTacos.name, PreMadeTacos.description FROM PreMadeTacos";
// $result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
// $i = 0;
// while($data = $result->fetch_assoc()) {
// 	$PreMadeTacos[$i] = $data;
// 	$i += 1;
// }

// foreach($PreMadeTacos as $key => $val) {
// 	//Get Fillings
// 	$query = "SELECT TacoFixings.name, TacoFixings.price FROM TacoDetails JOIN TacoFixings 
// 			  ON TacoDetails.tacofixing_id=TacoFixings.tacofixing_id JOIN TacoOrders 
// 			  ON TacoDetails.tacoorder_id=TacoOrders.tacoorder_id 
// 			  WHERE TacoOrders.tacoorder_id='".$PreMadeTacos[$key]['tacoorder_id']."'";
// 	$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
// 	$PreMadeTacos[$key]['ingredients'] = "\nIngredients: ";
// 	while($data = $result->fetch_assoc()) {
// 		$PreMadeTacos[$key]['ingredients'] = $PreMadeTacos[$key]['ingredients'] .  $data['name'] . ", ";
// 	}
// 	//Remove trailing space and comma
// 	$PreMadeTacos[$key]['ingredients'] = rtrim($PreMadeTacos[$key]['ingredients'],', ');
// }

?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Taco Truck!</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/accordion.css">
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
			<tr>
				<td><?php echo $PreMadeTacos[0]['name']; ?></td>
				<td><?php echo $PreMadeTacos[1]['name']; ?></td>
				<td>Taco 3</td>
				<td>Taco 4</td>
			</tr>
			<tr class="tacoRow">
				<td><img src="img/taco_icon.png" alt="Taco 1" title=<?php echo "\"".$PreMadeTacos[0]['description']." Ingredients: ".$PreMadeTacos[0]['ingredients']."\""; ?>></td>
				<td><img src="img/taco_icon.png" alt="Taco 2" title=<?php echo "\"".$PreMadeTacos[1]['description']." Ingredients: ".$PreMadeTacos[1]['ingredients']."\""; ?>></td>
				<td><img src="img/taco_icon.png" alt="Taco 3"></td>
				<td><img src="img/taco_icon.png" alt="Taco 4"></td>
			</tr>
			<tr>
				<td>Taco 5</td>
				<td>Taco 6</td>
				<td>Taco 7</td>
				<td>Taco 8</td>
			</tr>
			<tr class="tacoRow">
				<td><img src="img/taco_icon.png" alt="Taco 5"></td>
				<td><img src="img/taco_icon.png" alt="Taco 6"></td>
				<td><img src="img/taco_icon.png" alt="Taco 7"></td>
				<td><img src="img/taco_icon.png" alt="Taco 8"></td>
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
