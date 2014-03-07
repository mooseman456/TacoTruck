<?php

function startSession() {
	session_start();
	$_SESSION['objectArray']= "adsffads";
}


function storeJSON($array)
{
	$_SESSION['objectArray'] = $array;
}

function getOrderArray()
{
	return $_SESSION['objectArray']
}

function endSession() {
	session_destroy();
}

?>