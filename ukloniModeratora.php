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
		
	 
	if ( isset($_GET['korisnik']) && $_SESSION['level'] == 3)
	{
	$korisnikId = $_GET['korisnik'];
	$sql = "UPDATE korisnici SET nivo = '1' WHERE korisnikId = $korisnikId ";
	header('Location: korisnici.php');
	$conn->query($sql);
	}

?>
