<?php 
	session_start();
	include_once('konekcija.php');
	include_once('functions.php');

	if ($_SESSION['loggedin'] != 1 || $_SESSION['level'] < 2) 
	{
		header('location: login.php');	
	}

	$conn = new mysqli($_SESSION['serverName'], $_SESSION['username'], $_SESSION['password'], $_SESSION['database']);

		if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}
	headerNav();
	
	$sql = "SELECT * FROM prodaja";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
		echo "<table> 
			<tr> <th>Datum</th> <th>Kupac</th> <th>Knjiga</th> <th>Cena</th>
			</tr>";
	
		while ($row = $result->fetch_assoc())
		{	
			
			echo "
				<tr>
					<td>" . $row['datum'] ." </td>
					<td>" . $row['kupac'] ." </td>
					<td>" . $row['knjiga'] ." </td>
					<td>" . $row['cena'] ." </td>
					
				</tr>";
		}
	
	}
?>	