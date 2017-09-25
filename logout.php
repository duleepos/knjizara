<?php 
	session_start();
	include_once('functions.php');
	
	$_SESSION['loggedin'] = 0;
	session_destroy();
	headerNav();
	echo "Izlogovani ste!";
	
	
?>