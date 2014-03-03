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
        $result = $db->query($query)  or trigger_error($mysqli->error."[$query]"); //This line does the query
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

//Populate TacoFixings
$json = file_get_contents("taco_truck_menu.json");

$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($json, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);

foreach ($jsonIterator as $key => $val) {
    if(is_array($val)) {
    	if ($key !="menu" && !is_numeric($key))
        	$itemType=$key;
    	
    } else {
    	
    	if ($key =="name")
    		$name = $val;
    	elseif ($key=="heatRating")
    		$heatRating = $val;
    	elseif ($key=="price") {
    		$price = $val;
    		echo $out;
    		$query = "INSERT INTO TacoFixings (itemType, name, price, heatRating) VALUES ('$itemType', '$name', '$price', '$heatRating')";
    		$result = $db->query($query)  or trigger_error($mysqli->error."[$query]"); //This line does the query
    		$name=NULL;$price=NULL;$heatRating=NULL;
    	}
        
    }
}

//Orders data
if (($handle = fopen("Orders.csv", "r")) !== FALSE) {
	//First line contains titles of following lines
	$data = fgetcsv($handle, 1000, ",");

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    	//Insert all the User data into the database
        $num = count($data);
        $data[3] = ltrim($data[3], '$');
        $query = "INSERT INTO Orders (user_id, price, timePlaced) 
        		  VALUES ('$data[1]','$data[3]','$data[2]')";
        echo "$query";
        $result = $db->query($query)  or trigger_error($mysqli->error."[$query]"); //This line does the query
    }
    fclose($handle);
}

echo "<hr />";

//TacoOrders data
if (($handle = fopen("OrderItem.csv", "r")) !== FALSE) {
	//First line contains titles of following lines
	$data = fgetcsv($handle, 1000, ",");

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    	//Insert all the User data into the database
        $num = count($data);
        $query = "INSERT INTO TacoOrders (order_id, quantity) 
        		  VALUES ('$data[1]', '$data[2]')";
        echo "$query";
        $result = $db->query($query)  or trigger_error($mysqli->error."[$query]"); //This line does the query
    }
    fclose($handle);
}

echo "<hr />";

//TacoDetails data
if (($handle = fopen("OrderItemDetails.csv", "r")) !== FALSE) {
	//First line contains titles of following lines
	$data = fgetcsv($handle, 1000, ",");

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    	//Insert all the User data into the database
        $num = count($data);
        $query = "INSERT INTO TacoDetails (tacoorders_id, tacofixing_id) 
        		  VALUES ('$data[1]','$data[2]')";
        echo "$query";
        $result = $db->query($query)  or trigger_error($mysqli->error."[$query]"); //This line does the query
    }
    fclose($handle);
}

echo "<hr />";


?>
