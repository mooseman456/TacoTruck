<?php

require_once '../database/login.php';
$db = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if($db->connect_errno > 0){
	die('Unable to connect to database [' . $db->connect_error . ']');
}

//Get menu data
$query = "SELECT TacoFixings.name, TacoFixings.tacofixing_id FROM TacoFixings WHERE TacoFixings.itemType='Type'";
$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
while($row = $result->fetch_row()) {
  	$tacoTypes = $tacoTypes . "<div id=\"$row[1]\" class=\"fill menuItem\">$row[0]</div>";
}

$query = "SELECT TacoFixings.name, TacoFixings.tacofixing_id FROM TacoFixings WHERE TacoFixings.itemType='Tortillas'";
$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
while($row = $result->fetch_row()) {
  	$tacoTortillas = $tacoTortillas . "<div id=\"$row[1]\" class=\"tortilla menuItem\">$row[0]</div>";
}

$query = "SELECT TacoFixings.name, TacoFixings.tacofixing_id FROM TacoFixings WHERE TacoFixings.itemType='Rice'";
$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
while($row = $result->fetch_row()) {
  	$tacoRice = $tacoRice . "<div id=\"$row[1]\" class=\"rice menuItem\">$row[0]</div>";
}

$query = "SELECT TacoFixings.name, TacoFixings.tacofixing_id FROM TacoFixings WHERE TacoFixings.itemType='Cheese'";
$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
while($row = $result->fetch_row()) {
  	$tacoCheese = $tacoCheese . "<div id=\"$row[1]\" class=\"cheese menuItem\">$row[0]</div>";
}

$query = "SELECT TacoFixings.name, TacoFixings.tacofixing_id FROM TacoFixings WHERE TacoFixings.itemType='Beans'";
$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
while($row = $result->fetch_row()) {
  	$tacoBeans = $tacoBeans . "<div id=\"$row[1]\" class=\"beans menuItem\">$row[0]</div>";
}

$query = "SELECT TacoFixings.name, TacoFixings.tacofixing_id FROM TacoFixings WHERE TacoFixings.itemType='Sauces'";
$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
while($row = $result->fetch_row()) {
  	$tacoSauces = $tacoSauces . "<div id=\"$row[1]\" class=\"sauce menuItem\">$row[0]</div>";
}

$query = "SELECT TacoFixings.name, TacoFixings.tacofixing_id FROM TacoFixings WHERE TacoFixings.itemType='Vegetables'";
$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
while($row = $result->fetch_row()) {
  	$tacoVeggies = $tacoVeggies . "<div id=\"$row[1]\" class=\"vegetables menuItem\">$row[0]</div>";
}

$query = "SELECT TacoFixings.name, TacoFixings.tacofixing_id FROM TacoFixings WHERE TacoFixings.itemType='Extras'";
$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
while($row = $result->fetch_row()) {
  	$tacoExtras = $tacoExtras . "<div id=\"$row[1]\" class=\"extras menuItem\">$row[0]</div>";
}
//Banana
?>

<!doctype HTML>
<html>
   <head>
      <title>Custom Taco</title>
      <meta charset="utf-8">
	   <link rel="stylesheet" type="text/css" href="css/style.css">
	   <link rel="stylesheet" type="text/css" href="css/accordion.css">
	   <link href='http://fonts.googleapis.com/css?family=Condiment' rel='stylesheet' type='text/css'>

	   <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	   <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	   <script src="js/jquery.js"></script>
	   <script src="js/customTaco.js"></script>

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
			   <li><a href="index.php">Order</a></li>
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
	   
	   <!-- Current Taco Pane -->
	   <div id="currentTacoPane">
	      <h2 id="currentTaco">Current Taco</h2>
	      <div id="currentFill">
	         <h3>Filling</h3>
	         <p>Steak</p>
	      </div>
	      <div id="currentTortilla">
	         <h3>Filling</h3>
	         <p>Steak</p>
	      </div>
	      <div id="currentRice">
	         <h3>Filling</h3>
	         <p>Steak</p>
	      </div>
	      <div id="currentCheese">
	         <h3>Filling</h3>
	         <p></t>Steak</p>
	      </div>
	      <div id="currentBean">
	         <h3>Filling</h3>
	         <p>Steak</p>
	      </div>
	      <div id="currentSauce">
	         <h3>Filling</h3>
	         <p>Steak</p>
	      </div>
	      <div id="currentVeg">
	         <h3>Filling</h3>
	         <p>Steak</p>
	      </div>
	      <div id="currentExtras">
	         <h3>Filling</h3>
	         <p>Steak</p>
	      </div>
	   </div>
	   
	   <!-- Ingredients Pane -->
	   <div id="ingredientsPane">
		   <h2>Ingredients</h2>

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
					   <div class="rice menuItem clear">None</div>
			   </div>
			   <h3>Cheese</h3>
			   <div>
					   <?php echo $tacoCheese; ?>
					   <div class="cheese menuItem clear">None</div>
			   </div>
			   <h3>Beans</h3>
			   <div>
					   <?php echo $tacoBeans; ?>
					   <div class="beans menuItem clear">None</div>
			   </div>
			   <h3>Sauces</h3>
			   <div>
					   <?php echo $tacoSauces; ?>
			   </div>
			   <h3>Vegetables</h3>
			   <div>
					   <?php echo $tacoVeggies; ?>
					   <div class="vegetables menuItem clear">None</div>
			   </div>
			   <h3>Extras</h3>
			   <div>
					   <?php echo $tacoExtras; ?>
					   <div class="extras menuItem clear">None</div>
			   </div>
		   </div>

	   </div>
   </body>
</html>
