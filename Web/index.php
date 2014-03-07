<?php

session_start();

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
		$PreMadeTacos[$counter]['beans'].", ".$PreMadeTacos[$counter]['sauces'];
		
      	// Checks to see if the vegetables contains an array. Either way, adds the veggies as they need to be.
		if (is_array($taco['vegetables'])) {
			foreach ($taco['vegetables'] as $tempVegetables) {
				$PreMadeTacos[$counter]['ingredients'] .= ", ".$tempVegetables;
			}
		}
		else
			$PreMadeTacos[$counter]['ingredients'] .= ", ".$PreMadeTacos[$counter]['vegetables'];
		
		// Same with vegetables except with extras
		if (is_array($taco['extras'])) {
			foreach ($taco['extras'] as $tempExtras) {
				$PreMadeTacos[$counter]['ingredients'] .= ", ".$tempExtras;
			}
		}
		else
			$PreMadeTacos[$counter]['ingredients'] .= ", ".$PreMadeTacos[$counter]['extras'];
		
		//Remove trailing space and comma
		$PreMadeTacos[$counter]['price'] = $taco['price'];
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

<!--?php
$pageTitle = 'Welcome to the Taco Truck!';
include('include/header.php'); ?-->


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
	<script src="js/index.js"></script>
	<script type="text/javascript">

	$(function() {
		$( document ).tooltip();
	});
	</script>
</head>
<body>
   	<!-- Page navigation menu -->
   	<?php include 'navbar.php' ?>

	<!-- Order Pane -->
	<div class="orderPane shadowBoxLight">
		<h1 id="order">Order </h1>
		<!-- List of tacos in order -->
		<ul id="orderList">
		</ul>
		<!-- Tax and total --> 
		<ul id="taxAndTotal">
			<li id="taxTotal">Tax: $0.00</li>
			<li id="grandTotal">Grand Total: $0.00</li>
		</ul>
		<input class="userInput" type="submit" id="submitOrder" value="Check Out"/>
	</div>


	<!-- Table for menu -->
	<article class="menuPane">
		<!--h1>Menu</h1-->
		<section>
			<h2><?php echo $PreMadeTacos[0]['name']; ?></h2>
			<img price="<?php echo $PreMadeTacos[0]['price']; ?>" id="taco1" src="img/Taco1.png" alt="<?php echo $PreMadeTacos[0]['name']; ?>" title=<?php echo "\"".$PreMadeTacos[0]['description']." Ingredients: ".$PreMadeTacos[0]['ingredients']."\""; ?>></img>
		</section>
		<section>
			<h2><?php echo $PreMadeTacos[1]['name']; ?></h2>
			<img price="<?php echo $PreMadeTacos[1]['price']; ?>" id="taco2" class="resize" src="img/Taco2.png" alt="<?php echo $PreMadeTacos[1]['name']; ?>" title=<?php echo "\"".$PreMadeTacos[1]['description']." Ingredients: ".$PreMadeTacos[1]['ingredients']."\""; ?>></img>
		</section>
		<section>
			<h2><?php echo $PreMadeTacos[2]['name']; ?></h2>
			<img price="<?php echo $PreMadeTacos[2]['price']; ?>" id="taco3" src="img/Taco3.png" alt="<?php echo $PreMadeTacos[2]['name']; ?>" title=<?php echo "\"".$PreMadeTacos[2]['description']." Ingredients: ".$PreMadeTacos[2]['ingredients']."\""; ?>></img>
		</section>
		<section>
			<h2><?php echo $PreMadeTacos[3]['name']; ?></h2>
			<img price="<?php echo $PreMadeTacos[3]['price']; ?>" id="taco4" src="img/Taco4.png" alt="<?php echo $PreMadeTacos[3]['name']; ?>" title=<?php echo "\"".$PreMadeTacos[3]['description']." Ingredients: ".$PreMadeTacos[1]['ingredients']."\""; ?>></img>
		</section>
		<section>
			<h2><?php echo $PreMadeTacos[4]['name']; ?></h2>
			<img price="<?php echo $PreMadeTacos[4]['price']; ?>" id="taco5" src="img/Taco5.png" alt="<?php echo $PreMadeTacos[4]['name']; ?>" class="taco" title=<?php echo "\"".$PreMadeTacos[4]['description'].$PreMadeTacos[4]['ingredients']."\""; ?>>
		</section>
		<section>
			<h2><?php echo $PreMadeTacos[5]['name']; ?></h2>
			<img price="<?php echo $PreMadeTacos[5]['price']; ?>" id="taco6" src="img/Taco6.png" alt="<?php echo $PreMadeTacos[5]['name']; ?>" class="taco" title=<?php echo "\"".$PreMadeTacos[5]['description'].$PreMadeTacos[5]['ingredients']."\""; ?>>
		</section>
		<section>
			<h2><?php echo $PreMadeTacos[6]['name']; ?></h2>
			<img price="<?php echo $PreMadeTacos[6]['price']; ?>" id="taco7" src="img/Taco7.png" alt="<?php echo $PreMadeTacos[6]['name']; ?>" class="taco" title=<?php echo "\"".$PreMadeTacos[6]['description'].$PreMadeTacos[6]['ingredients']."\""; ?>>
		</section>
		<section>
			<h2><?php echo $PreMadeTacos[7]['name']; ?></h2>
			<img price="<?php echo $PreMadeTacos[7]['price']; ?>" id="taco8" src="img/Taco8.png" alt="<?php echo $PreMadeTacos[7]['name']; ?>" class="taco" title=<?php echo "\"".$PreMadeTacos[7]['description'].$PreMadeTacos[7]['ingredients']."\""; ?>>
		</section>
		<section id="customTaco">
			<h2>Custom Taco</h2>
			<img id="customTaco" src="img/plus_icon.png" alt="Custom Taco">
		</section>
		<section>
			<h2>Previous Taco</h2>
			<img id="previousTaco" src="img/previous_icon.png" alt="Previous Taco">
		</section>
	</article>

	<script src="js/main.js"></script>
</body>
</html>
