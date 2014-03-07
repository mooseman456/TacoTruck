<?php

require_once '../database/login.php';
$db = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if($db->connect_errno > 0){
	die('Unable to connect to database [' . $db->connect_error . ']');
}

//Get menu data
$query = "SELECT TacoFixings.name, TacoFixings.tacofixing_id, TacoFixings.price FROM TacoFixings WHERE TacoFixings.itemType='Type'";
$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
while($row = $result->fetch_row()) {
  	$tacoTypes = $tacoTypes . "<div id=\"$row[1]\" class=\"fill menuItem\" price=\"$row[2]\">$row[0]: <span class=price>\$$row[2]</span></div>";
}

$query = "SELECT TacoFixings.name, TacoFixings.tacofixing_id, TacoFixings.price FROM TacoFixings WHERE TacoFixings.itemType='Tortillas'";
$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
while($row = $result->fetch_row()) {
  	$tacoTortillas = $tacoTortillas . "<div id=\"$row[1]\" class=\"tortilla menuItem\" price=\"$row[2]\">$row[0] Tortilla: <span class=price>\$$row[2]</span></div>";
}

$query = "SELECT TacoFixings.name, TacoFixings.tacofixing_id, TacoFixings.price FROM TacoFixings WHERE TacoFixings.itemType='Rice'";
$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
while($row = $result->fetch_row()) {
  	$tacoRice = $tacoRice . "<div id=\"$row[1]\" class=\"rice menuItem\" price=\"$row[2]\">$row[0]: <span class=price>\$$row[2]</span></div>";
}

$query = "SELECT TacoFixings.name, TacoFixings.tacofixing_id, TacoFixings.price FROM TacoFixings WHERE TacoFixings.itemType='Cheese'";
$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
while($row = $result->fetch_row()) {
  	$tacoCheese = $tacoCheese . "<div id=\"$row[1]\" class=\"cheese menuItem\" price=\"$row[2]\">$row[0]: <span class=price>\$$row[2]</span></div>";
}

$query = "SELECT TacoFixings.name, TacoFixings.tacofixing_id, TacoFixings.price FROM TacoFixings WHERE TacoFixings.itemType='Beans'";
$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
while($row = $result->fetch_row()) {
  	$tacoBeans = $tacoBeans . "<div id=\"$row[1]\" class=\"beans menuItem\" price=\"$row[2]\">$row[0]: <span class=price>\$$row[2]</span></div>";
}

$query = "SELECT TacoFixings.name, TacoFixings.tacofixing_id FROM TacoFixings WHERE TacoFixings.itemType='Sauces'";
$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
while($row = $result->fetch_row()) {
   if ($row[1] != 23)
  	   $tacoSauces = $tacoSauces . "<div id=\"$row[1]\" class=\"sauce menuItem\" price=\"$row[2]\">$row[0]</div>";
  	else
  	   $noSauce = "<div id=\"$row[1]\" class=\"sauce menuItem clear\" price=\"$row[2]\">$row[0]</div>";
}
$tacoSauces = $tacoSauces . $noSauce;

$query = "SELECT TacoFixings.name, TacoFixings.tacofixing_id, TacoFixings.price FROM TacoFixings WHERE TacoFixings.itemType='Vegetables'";
$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
while($row = $result->fetch_row()) {
  	$tacoVeggies = $tacoVeggies . "<div id=\"$row[1]\" class=\"vegetables menuItem\" price=\"$row[2]\">$row[0]</div>";
}

$query = "SELECT TacoFixings.name, TacoFixings.tacofixing_id, TacoFixings.price FROM TacoFixings WHERE TacoFixings.itemType='Extras'";
$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
while($row = $result->fetch_row()) {
  	$tacoExtras = $tacoExtras . "<div id=\"$row[1]\" class=\"extras menuItem\" price=\"$row[2]\">$row[0]: <span class=price>\$$row[2]</span></div>";
}
?>

<!doctype HTML>
<html>
   <head>
      <title>Custom Taco</title>
      <meta charset="utf-8">
	   <link rel="stylesheet" type="text/css" href="css/style.css">
	   <link rel="stylesheet" type="text/css" href="css/accordion.css">
	   <link href='http://fonts.googleapis.com/css?family=Condiment' rel='stylesheet' type='text/css'>
	   <link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>

	   <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	   <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	   <script src="js/jquery.js"></script>
	   <script src="js/customTaco.js"></script>
	   <script src="js/main.js"></script>
	   <?php include 'session.php'; ?>

	   <?php
   		session_start();
		echo "User : ".$_SESSION['username'];
		?>

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
			   <li><a href="index.php">Menu</a></li>
			   <li><a href="about.php">About</a></li>
			   <li><a href="locations.php">Locations</a></li>
			   <li id="accountLink"><a href="account.php">Sign In/Create Account</a></li>
		   </ul>
	   </nav>
	   <div id="navSpace"></div>

	   <!-- Order Pane -->
	   <div class="orderPane shadowBoxLight">
		   <h1 id="order">Order </h1>
		   <!-- List of tacos in order -->
		   <ul>
		   </ul>
		   <!-- Tax and total -->
		   <ul>
			   <li id="taxTotal">Tax: $0.00</li>
			   <li id="grandTotal">Grand Total: $0.00</li>
		   </ul>
		   <input class="userInput" type="submit" id="submitOrder" value="Check Out"/>
	   </div>
	   
	   <!-- Current Taco Pane -->
	   <div class="shadowBoxLight" id="currentTacoPane">
	      <h1 id="currentTaco">Current Taco</h1>
	      <p id="currentFill" class="currentList">
	         Please select a filling
	      </p>
	      <p id="currentTortilla" class="currentList">
	         Please select a tortilla
	      </p>
	      <p id="currentRice" class="currentList">
	         No Rice
	      </p>
	      <p id="currentCheese" class="currentList">
	         No Cheese
	      </p>
	      <p id="currentBeans" class="currentList">
	         No Beans
	      </p>
	      <p id="currentSauce" class="currentList">
	         No Sauce
	      </p>
	      <p id="currentVeg" class="currentList">
	         No Vegetables
	      </p>
	      <p id="currentExtras" class="currentList">
	         No Extras
	      </p>
	      <p id="tacoTotal" class="currentList">
	         Subtotal
	      </p>
	      <input class="userInput" type="submit" id="addTaco" value="Add Taco"/>
	      <input class="userInput" type="submit" id="cancelTaco" value="Cancel Taco"/>
	   </div>
	   
	   <!-- Ingredients Pane -->
	   <div class="shadowBoxLight" id="ingredientsPane">
		   <h1>Ingredients</h1>

		   <div id="accordion">
			   <h3>Types</h3>
			   <div>
					   <?php echo $tacoTypes; ?>
			   </div>
			   <h3>Tortillas</h3>
			   <div>
					   <?php echo $tacoTortillas; ?>
			   </div>
			   <h3>Rice</h3>
			   <div>
					   <?php echo $tacoRice; ?>
					   <div class="rice menuItem selected clear">No Rice</div>
			   </div>
			   <h3>Cheese</h3>
			   <div>
					   <?php echo $tacoCheese; ?>
					   <div class="cheese menuItem selected clear">No Cheese</div>
			   </div>
			   <h3>Beans</h3>
			   <div>
					   <?php echo $tacoBeans; ?>
					   <div class="beans menuItem selected clear">No Beans</div>
			   </div>
			   <h3>Sauces</h3>
			   <div>
					   <?php echo $tacoSauces; ?>
			   </div>
			   <h3>Vegetables</h3>
			   <div>
					   <?php echo $tacoVeggies; ?>
					   <div class="vegetables menuItem selected clear">No Vegetables</div>
			   </div>
			   <h3>Extras</h3>
			   <div>
					   <?php echo $tacoExtras; ?>
					   <div class="extras menuItem selected clear">No Extras</div>
			   </div>
		   </div>

	   </div>
   </body>
</html>
