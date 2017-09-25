<?php 
	session_start();
	include_once('konekcija.php');
	include_once('functions.php');

	if ($_SESSION['loggedin'] != 1 || $_SESSION['level'] < 2) 
	{
		header('location: login.php');	
	}

	headerNav();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form name="books" action="unosKnjige.php" method="post">
		<label>Naslov:</label> <br/>
		<input type="text" name="name"> <br/>
		<label>Autor</label> <br/>
		<input type="text" name="author"><br/>
		<label>Godina</label> <br/>
		<input type="text" name="year"><br/>
		<label>Kategorija</label> <br/>
		<input type="text" name="category"><br/>
		<label>Cena</label> <br/>
		<input type="text" name="price"><br/>
		<label>Kolicina</label> <br/>
		<input type="text" name="kolicina"><br/>
		
		
		<input type="submit">
	
	</form>
</body>
</html>