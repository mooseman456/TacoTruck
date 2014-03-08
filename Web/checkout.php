<?php

session_start();

if (isset($_SESSION['givenName'])) {
	$accountText = $_SESSION['givenName'].", Sign Out";
	$givenName = $_SESSION['givenName'];
	$surname = $_SESSION['surname'];
	$email = $_SESSION['email'];
	$phoneNumber = $_SESSION['phoneNumber'];
	$CC_Provider = $_SESSION['CC_Provider'];
	$CC_Number = $_SESSION['CC_Number'];

} else {
	$accountText = "Sign In/Create Account";
	$CC_Provider = "Credit Card Provider";
}


require_once '../database/login.php';
$db = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if($db->connect_errno > 0){
	die('Unable to connect to database [' . $db->connect_error . ']');
}

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) { 
	$quantity = $_SESSION['Order'][$key];
	$user_id = $_SESSION['user_id'];
	$price = '1';

	date_default_timezone_get();
	$timePlaced = date('m/d/Y h:i:s', time());
	echo $user_id;
	mysqli_query($db,"INSERT INTO Orders (Orders.user_id, Orders.price, Orders.timePlaced)
	VALUES ('$user_id', '$price', '$timePlaced')" or trigger_error($mysqli->error."[$query]"));

	$retrievedOrder_id = mysqli_query($db,"SELECT Orders.order_id FROM Orders WHERE Orders.user_id='$user_id' AND Orders.timePlaced = '$timePlaced'") or trigger_error($mysqli->error."[$query]");

	mysqli_query($db,"INSERT INTO TacoOrders (order_id, quantity)
	VALUES ('$retrievedOrder_id', '$quantity')") or trigger_error($mysqli->error."[$query]");

	$retrievedTacoOrder_id = mysqli_query($db,"SELECT TacoOrders.tacoorder_id FROM TacoOrders WHERE TacoOrders.order_id='$retrievedOrder_id' AND TacoOrders.quantity = '$quantity'") or trigger_error($mysqli->error."[$query]");


	mysqli_query($db,"INSERT INTO TacoDetails (tacoorder_id, tacofixing_id)
	VALUES ('$retrievedTacoOrder_id', '1')") or trigger_error($mysqli->error."[$query]");

	// WHERE SHOULD THIS GO????????????
	header('Location: index.php');
}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Order Checkout</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/accordion.css">
	<link href='http://fonts.googleapis.com/css?family=Condiment' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>

	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script src="js/main.js"></script>

</head>
<body>
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

	<?php
	$page="checkout";
	include 'include/orderPane.php';
	?>

	<div class="checkoutPane shadowBoxLight">
		<form class="userForm" method="POST">
			<input class="userInput" type="text" name="firstname" value="<?php echo $givenName ?>" placeholder="First Name"><br>
			<input class="userInput" type="text" name="lastname" value="<?php echo $surname ?>" placeholder="Last Name"><br>
			<input class="userInput" type="email" name="email" value="<?php echo $email ?>" placeholder="Email"><br>
			<input class="userInput" type="text" name="phonenumber" value="<?php echo $phoneNumber ?>" placeholder="Phone Number"><br>
			<select class="userInput" name = "ccprovider">
				<option selected="selected" id="defaultProvider"><?php echo $CC_Provider ?></option>
				<option value="Mastercard">Master Card</option>
				<option value="American Express">American Express</option>
				<option value="Visa">Visa</option>
			</select><br>
			<input class="userInput" type="text" name="ccnumber" value="<?php echo $CC_Number ?>" placeholder="Credit Card Number"><br>
			<input class="userInput" type="submit" value="Order">
		</form>
	</div>

</body>
</html>
