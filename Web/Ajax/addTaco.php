<?php

session_start();

require_once '../../database/login.php';
$db = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if($db->connect_errno > 0){
	die('Unable to connect to database [' . $db->connect_error . ']');
}

if (!isset($_SESSION['tacoID'])) {
	$_SESSION['tacoID']=0;
}
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) { 

	$data = array();
	
	if ($_POST['id'] == "customTaco") {
		$data['id'] = $_POST['id'] . (string)$_SESSION['tacoID'];
		$_SESSION['tacoID'] += 1;
	}
	else
		$data['id'] = $_POST['id'];	

	if (isAlreadyInOrder($data['id']) == false) { 	//New taco added

		$data['name'] = $_POST['Name'];
		
		if(strpos($_POST['name'],'Custom') == false) { //This is a Premade Taco
			$data['quantity'] = $_POST['Quantity'];
			$data['basePrice'] = $_POST['basePrice'];
			$data['calcPrice'] = $_POST['calcPrice'];

			foreach($_SESSION['PremadeTacos'] as $key => $val) {
				if($_SESSION['PremadeTacos'][$key]['name'] == $data['name']) {
					$data['ingredients'] = $_SESSION['PremadeTacos'][$key]['ingredients'];
				}
			}

			foreach($data['ingredients'] as $key => $val) {
				$query = "SELECT tacofixing_id FROM TacoFixings WHERE name='".$data['ingredients'][$key]."'";
				$result = $db->query("SELECT tacofixing_id FROM TacoFixings WHERE name='".$data['ingredients'][$key]."'");

				$row = $result->fetch_row();

				$data['ingredients'][$key] = $row[0];
			}

			$_SESSION['Order'][] = $data;

		} else {									//This is a Custom Taco
			$data['quantity'] = $_POST['Quantity'];
			$data['basePrice'] = $_POST['basePrice'];
			$data['calcPrice'] = $_POST['calcPrice'];
			$data['ingredients'] = $_POST['ingredients'];
			$data['ingredients'] = explode(",", $data['ingredients']);
			$_SESSION['Order'][] = $data;
		}

	} else { 										//One of same taco added

		$data['name'] = $_POST['Name'];
		$data['quantity'] = $_POST['Quantity'];
		$data['basePrice'] = $_POST['basePrice'];
		$data['calcPrice'] = $_POST['calcPrice'];
		
		foreach($_SESSION['Order'] as $key => $val) {

			if($_SESSION['Order'][$key]['id'] == $data['id']) {
				
				$_SESSION['Order'][$key]['quantity'] = $_SESSION['Order'][$key]['quantity'] + 1;
				$_SESSION['Order'][$key]['calcPrice'] = $data['calcPrice'];
				break;
			}
		}
	}

} else {
	var_dump($_SESSION);
}


function isAlreadyInOrder($id) {
	
	foreach($_SESSION['Order'] as $key => $val) {
	
		if($_SESSION['Order'][$key]['id'] == $id) {
			return true;
		}

	}

	return false;

}

?>
