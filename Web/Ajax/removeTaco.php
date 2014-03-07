<?php

session_start();

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) { 

	$id = $_POST['id'];

	$id = str_replace("Cancel", "", $id);

	foreach($_SESSION['Order'] as $key => $val) {

		if($_SESSION['Order'][$key]['id'] == $id) {
			
			unset($_SESSION['Order'][$key]);
			break;

		}

	}

} else {
	echo "hello";
}

?>