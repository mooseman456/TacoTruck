<?php

session_start();

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
		$data['quantity'] = $_POST['Quantity'];
		$data['basePrice'] = $_POST['basePrice'];
		$data['calcPrice'] = $_POST['calcPrice'];
		$data['ingredients'] = $_POST['ingredients'];
		$data['ingredients'] = explode(",", $data['ingredients']);
		$_SESSION['Order'][] = $data;

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
