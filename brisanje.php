<?php 
	session_start();
	include_once('konekcija.php');
	include_once('functions.php');

	$conn = new mysqli($_SESSION['serverName'], $_SESSION['username'], $_SESSION['password'], $_SESSION['database']);

		if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}
	if (isset($_GET['knjiga']) && $_SESSION['level'] >1) {
			$knjiga = $_GET['knjiga'];
			$sql = "DELETE FROM knjige WHERE knjigaID = '$knjiga'";
			$conn->query($sql);
			header('location: katalog.php');
		}	

?>		