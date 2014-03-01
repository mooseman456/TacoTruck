<?php

//connect to mysql
require_once 'login.php';
$db = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if($db->connect_errno > 0){
	die('Unable to connect to database [' . $db->connect_error . ']');
}


//USERS data
if (($handle = fopen("Users.csv", "r")) !== FALSE) {
	//First line contains titles of following lines
	$data = fgetcsv($handle, 1000, ",");

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    	//Insert all the User data into the database
        $num = count($data);
        $query = "INSERT INTO Users (user_id, givenName, surname, email, password, phoneNumber, CC_Provider, CC_Number) 
        		  VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]')";
        //$result = $db->query($query)  or trigger_error($mysqli->error."[$query]"); //This line does the query
    }
    fclose($handle);
}

echo "<hr />";

//Menu Items JSON
if (($handle = fopen("taco_truck_menu.json", "r")) !== FALSE) {
	
	$json = file_get_contents('taco_truck_menu.json');
	$data = json_decode($json,true);

	foreach ($data['menu'] as $key => $menuitem) {
		echo "<h1>$key</h1>";
		$table = $key;
		foreach($menuitem as $item) {
			$name = $item['name'];
			$price = $item['price'];

			if (array_key_exists("heatRating", $item)) {
				$heatRating = $item['heatRating'];
				echo "$name (heat: $heatRating) - $price<br />";
				$query = "INSERT INTO $table (name, price, heatRating) VALUES ('$name', '$price', '$heatRating')";
				$result = $db->query($query)  or trigger_error($mysqli->error."[$query]"); //This line does the query
			} else {
				echo "$name - $$price<br />";
				$query = "INSERT INTO $table (name, price) VALUES ('$name', '$price')";
				$result = $db->query($query)  or trigger_error($mysqli->error."[$query]"); //This line does the query
			}
		}
		echo "<br /><hr /><br />";
	}
}


?>