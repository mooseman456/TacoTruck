<?php

session_start();

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) { 

	$_SESSION['Order'][] = $_POST['Taco'];

} else {

	if ($_SESSION['Order']) {
		var_dump($_SESSION);
	}
}

?>