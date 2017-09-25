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
	$sql = "SELECT * FROM knjige WHERE istaknuta = 1";
	$result = $conn->query($sql);
		if ($result->num_rows < 4) 
		{
		$knjiga = $_GET['knjiga'];
		$sql = "UPDATE knjige SET istaknuta = '1' WHERE knjigaID = $knjiga ";
		
		$conn->query($sql);
		}
		header('Location: katalog.php');

	
	}


?>