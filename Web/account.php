<?php

session_start();

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

		$query = "SELECT * FROM Users WHERE email='$email'";

		$result = $db->query($query)  or trigger_error($mysqli->error."[$query]");
		$row = $result->fetch_assoc();

		if (password_verify($password, $row['password'])) {
			$_SESSION['user_id'] = $row['user_id'];
			$_SESSION['givenName'] = $row['givenName'];
			$_SESSION['surname'] = $row['surname'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['phoneNumber'] = $row['phoneNumber'];
			$_SESSION['CC_Provider'] = $row['CC_Provider'];
			$_SESSION['CC_Number'] = $row['CC_Number'];

			echo $_SESSION['givenName'];

			if (isset($_SESSION['givenName'])) {
				echo "set";
			} else {
				echo "unset";
			}


			//header('Location: index.php');
		} else {
			$loginStatus = "<p style=\"text-align:center;\">Login Failed</p>";
		}
	} else { //Someone is creating a new account
		$givenName = mysql_real_escape_string($_POST['firstname']);
		$surname = mysql_real_escape_string($_POST['lastname']);
		$email = mysql_real_escape_string($_POST['email']);
		$password = password_hash(mysql_real_escape_string($_POST['password']), PASSWORD_BCRYPT);
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

<script>

function accountCreationVerification() {
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    var ok = true;
    if (pass1 != pass2) {

        //alert("Passwords Do not match");
        document.getElementById("pass1").style.borderColor = "#E34234";
        document.getElementById("pass2").style.borderColor = "#E34234";
        ok = false;
    }

    var phoneNumber = document.getElementById("phoneNum").value;
    if (!/^\d+$/.test(phoneNumber)) {
    	document.getElementById("phoneNum").style.borderColor = "#E34234";
    	ok = false;
    }

    var ccNumber = document.getElementById("ccnum").value;
    if (!/^\d+$/.test(ccNumber)) {
    	document.getElementById("ccnum").style.borderColor = "#E34234";
    	ok = false;
    }



    return ok;
}
</script>


<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Account</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Condiment' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script src="js/main.js"></script>
</head>
<body>
   	<!-- Page navigation menu -->
   	<?php include 'navbar.php' ?>

	<div class="accountForm">
		<div id="signInPane" class="shadowBox">
			<h1>Sign In</h1>
			<form class="userForm" method="POST">
				<input class="userInput" type="text" name="email" placeholder="Email" required><br>
				<input class="userInput" type="password" name="password" placeholder="Password" required><br>
				<input class="userInput button" type="submit" value="Sign In">
			</form>
			<div>
				<?php echo $loginStatus; ?>
			</div>
		</div>

		<div id="createAccountPane" class="shadowBox">
			<h1>Create an Account</h1>
			<form class="userForm" method="POST" onsubmit="return accountCreationVerification()">
				<input class="userInput" type="text" name="firstname" placeholder="First Name" required><br>
				<input class="userInput" type="text" name="lastname" placeholder="Last Name" required><br>
				<input class="userInput" type="email" name="email" placeholder="Email" required><br>
				<input class="userInput" type="password" id="pass1" name="password" placeholder="Password" pattern=".{8,}" title="Minimum 8 characters" required><br>
				<input class="userInput" type="password" id="pass2" name="password" placeholder="Confirm Password" pattern=".{8,}" title="Minimum 8 characters" required><br>
				<input class="userInput" type="text" id="phoneNum" name="phonenumber" placeholder="Phone Number" pattern=".{10}" title="Valid 10-digit Phone Number" required><br>
				<select class="userInput" name = "ccprovider">
					<option value="Mastercard">Master Card</option>
					<option value="American Express">American Express</option>
					<option value="Visa">Visa</option>
				</select><br>
				<input class="userInput" type="text" id="ccnum" name="ccnumber" placeholder="Credit Card Number" pattern=".{13,16}" title="Valid Credit Card Number"><br>
				<input class="userInput" type="submit" value="Register">
			</form>
		</div>
	</div>

	<script src="js/main.js"></script>
</body>
</html>
