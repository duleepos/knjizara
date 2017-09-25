<?php 
	session_start();
	include_once('konekcija.php');
	include_once('functions.php');
	if ($_SESSION['loggedin'] != 1) {
		header('location: login.php');
	}

	$conn = new mysqli($_SESSION['serverName'], $_SESSION['username'], $_SESSION['password'], $_SESSION['database']);

		if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}
		
	 
	if ( isset($_GET['knjiga']) && $_SESSION['level'] > 1)
	{
	$knjiga = $_GET['knjiga'];
	$sql = "UPDATE knjige SET istaknuta = '0' WHERE knjigaID = $knjiga ";
	header('Location: katalog.php');
	$conn->query($sql);
	}

?>