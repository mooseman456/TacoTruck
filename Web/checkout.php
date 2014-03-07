<!doctype html>
<html lang="en">
   <head>
	   <meta charset="utf-8">
	   <title>Welcome to Taco Truck!</title>
	   <link rel="stylesheet" type="text/css" href="css/style.css">
	   <link href='http://fonts.googleapis.com/css?family=Swanky+and+Moo+Moo' rel='stylesheet' type='text/css'>
      <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	   <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <script src="js/main.js"></script>

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
		   <input type="submit" id="editOrder" value="Edit Order"/>
	   </div>

	   <div class="checkoutPane">
		   <form class="userForm" method="POST">
			   <input class="userInput" type="text" name="firstname" placeholder="First Name"><br>
			   <input class="userInput" type="text" name="lastname" placeholder="Last Name"><br>
			   <input class="userInput" type="email" name="email" placeholder="Email"><br>
			   <input class="userInput" type="text" name="phonenumber" placeholder="Phone Number"><br>
			   <select class="userInput" name = "ccprovider">
				   <option value="Mastercard">Master Card</option>
				   <option value="American Express">American Express</option>
				   <option value="Visa">Visa</option>
			   </select><br>
			   <input class="userInput" type="text" name="ccnumber" placeholder="Credit Card Number"><br>
			   <input class="userInput" type="submit" value="Order">
		   </form>
	   </div>

   </body>
</html>
