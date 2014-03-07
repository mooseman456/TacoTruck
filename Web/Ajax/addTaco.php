<?php

session_start();

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) { 

	$data = array();

	$data['name'] = $_POST['Name'];
	$data['quantity'] = $_POST['Quantity'];
	$data['basePrice'] = $_POST['basePrice'];
	$data['calcPrice'] = $_POST['calcPrice'];
	$data['id'] = $_POST['id'];

	$_SESSION['Order'][] = $data;

} else {

	if ($_SESSION['Order']) {
		var_dump($_SESSION);
	}
}

?>