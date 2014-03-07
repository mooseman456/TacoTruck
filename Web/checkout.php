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
   	<?php include 'navbar.php' ?>

	   <!-- Order Pane -->
	   <div class="orderPane shadowBoxLight">
		   <h2 id="order">Order </h2>
		   <!-- List of tacos in order -->
		   <ul>
		   </ul>
		   <!-- Tax and total -->
		   <ul>
			   <li id="taxTotal">Tax: $0.00</li>
			   <li id="grandTotal">Grand Total: $0.00</li>
		   </ul>
		   <input type="submit" id="editOrder" value="Edit Order"/>
	   </div>

	   <div class="checkoutPane shadowBoxLight">
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
