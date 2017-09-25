<?php 
	session_start();
	include_once('konekcija.php');
	include_once('functions.php');
	if ($_SESSION['loggedin'] != 1) {
		header('location: login.php');
	}
	headerNav();
	$conn = new mysqli($_SESSION['serverName'], $_SESSION['username'], $_SESSION['password'], $_SESSION['database']);

		if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}
		
	 
	if ( isset($_GET['proizvod']) && isset($_GET['cena']) )
	{
	$knjiga = $_GET['proizvod'];
	$cena = $_GET['cena'];
	$date = time();
	$kupac = $_SESSION['accountId'];
	

	$sql = "INSERT INTO prodaja (datum, kupac, knjiga, cena) VALUES ('$date', '$kupac', '$knjiga', '$cena')";
	$conn->query($sql);
	}
	echo "Uspesno ste kupili!";

	$sql = "UPDATE knjige SET kolicina = kolicina - 1 WHERE knjigaID = $knjiga ";
	$conn->query($sql);
?>
