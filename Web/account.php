<?php

require_once '../database/login.php';
$db = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if($db->connect_errno > 0){
	die('Unable to connect to database [' . $db->connect_error . ']');
}

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) { 

	//Someone is Logging in
	if ($_POST['ccprovider'] == NULL) {
		//cleanse the POST array
		$email = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['password']);

		$submittedEmail = $email;
		$submittedPassword = $password;

		$query = "SELECT * FROM Users WHERE password='$submittedPassword' AND email='$submittedEmail'";

		// die($query);

		$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
		$row = $result->fetch_assoc();

		if(empty($row)) {
			$loginStatus = "<p style=\"text-align:center;\">Login Failed</p>";
		} else {
			session_start();

			$_SESSION['user_id'] = $row['user_id'];
			$_SESSION['givenName'] = $row['givenName'];
			$_SESSION['surname'] = $row['surname'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['phoneNumber'] = $row['phoneNumber'];
			$_SESSION['CC_Provider'] = $row['CC_Provider'];
			$_SESSION['CC_Number'] = $row['CC_Number'];

			header('Location: index.php');
		}
	} else { //Someone is creating a new account
		$givenName = mysql_real_escape_string($_POST['firstname']);
		$surname = mysql_real_escape_string($_POST['lastname']);
		$email = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['password']);
		$phoneNumber = mysql_real_escape_string($_POST['phonenumber']);
		$CC_Provider = mysql_real_escape_string($_POST['ccprovider']);
		$CC_Number = mysql_real_escape_string($_POST['ccnumber']);

		$query = "INSERT INTO Users (givenName, surname, email, password, phoneNumber, CC_Provider, CC_Number) 
							VALUES ('$givenName', '$surname', '$email', '$password', '$phoneNumber', '$CC_Provider', '$CC_Number')";
		$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");

		session_start();

		$_SESSION['user_id'] = $db->insert_id;
		$_SESSION['givenName'] = $givenName;
		$_SESSION['surname'] = $surname;
		$_SESSION['email'] = $email;
		$_SESSION['phoneNumber'] = $phoneNumber;
		$_SESSION['CC_Provider'] = $CC_Provider;
		$_SESSION['CC_Number'] = $CC_Number;

		header('Location: index.php');

	}

} else {
	$loginStatus = "";
}


?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Account</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Condiment' rel='stylesheet' type='text/css'>
</head>
<body>
	<!-- Page navigation menu -->
	<nav id="navbar">
		<ul>
			<li><img id="logoImg" src="img/taco_truck_logo.png" alt="Logo" title="Logo"></li>
			<li><a href="index.php">Order</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="locations.php">Locations</a></li>
			<li id="accountLink" class="select"><a>Sign In/Create Account</a></li>
		</ul>
	</nav>
	<div id="navSpace"></div>
	<div id="navSpace"></div>

	<div id="tempDiv"></div>

	<div class="accountForm">
		<div id="signInPane" class="shadowBox">
			<h1>Sign In</h1>
			<form class="userForm" method="POST">
				<input class="userInput" type="text" name="email" placeholder="Email"><br>
				<input class="userInput" type="password" name="password" placeholder="Password"><br>
				<input class="userInput" type="submit" value="Sign In">
			</form>
			<div>
				<?php echo $loginStatus; ?>
			</div>
		</div>

		<div id="createAccountPane" class="shadowBox">
			<h1>Create an Account</h1>
			<form class="userForm" method="POST">
				<input class="userInput" type="text" name="firstname" placeholder="First Name"><br>
				<input class="userInput" type="text" name="lastname" placeholder="Last Name"><br>
				<input class="userInput" type="email" name="email" placeholder="Email"><br>
				<input class="userInput" type="password" name="password" placeholder="Password"><br>
				<input class="userInput" type="password" name="password" placeholder="Confirm Password"><br>
				<input class="userInput" type="text" name="phonenumber" placeholder="Phone Number"><br>
				<select class="userInput" name = "ccprovider">
					<option value="Mastercard">Master Card</option>
					<option value="American Express">American Express</option>
					<option value="Visa">Visa</option>
				</select><br>
				<input class="userInput" type="text" name="ccnumber" placeholder="Credit Card Number"><br>
				<input class="userInput" type="submit" value="Register">
			</form>
		</div>
	</div>

	<script src="js/main.js"></script>
</body>
</html>
