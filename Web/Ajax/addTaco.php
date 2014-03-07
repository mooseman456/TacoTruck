<?php

session_start();

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) { 

	$data = array();

	$data['id'] = $_POST['id'];
	
	if (isAlreadyInOrder($data['id']) == false) {

		$data['name'] = $_POST['Name'];
		$data['quantity'] = $_POST['Quantity'];
		$data['basePrice'] = $_POST['basePrice'];
		$data['calcPrice'] = $_POST['calcPrice'];

		$_SESSION['Order'][] = $data;

	} else {

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