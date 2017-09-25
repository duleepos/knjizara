<?php 

	include_once('konekcija.php');

	$conn = new mysqli($_SESSION['serverName'], $_SESSION['username'], $_SESSION['password'], $_SESSION['database']);

		if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}
		
	if (!empty($_POST['name']) && !empty($_POST['author']) && !empty($_POST['year']) && !empty($_POST['category']) && !empty($_POST['price'])) 
	{
		$name = $_POST['name'];
		$author = $_POST['author'];
		$year = $_POST['year'];
		$category = $_POST['category'];
		$price = $_POST['price'];
		$kolicina = $_POST['kolicina'];

		$sql = "INSERT INTO knjige (naslov, autor, godina, kategorija, cena, kolicina) VALUES ('$name', '$author', '$year', '$category', '$price', $kolicina)";
		$conn->query($sql);
	}

?>
