<?php
	include_once('konekcija.php');
	include_once('functions.php');

	$conn = new mysqli($_SESSION['serverName'], $_SESSION['username'], $_SESSION['password'], $_SESSION['database']);

		if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}
	if (!empty($_GET['pretraga'])) 
	{
		$pretraga = $_GET['pretraga'];
		$sql = "SELECT * FROM knjige WHERE naslov like '%$pretraga%' and autor like '%$pretraga%'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{
			while ($row = $result->fetch_assoc()) 
			{
				echo "<table> 
						<tr> <th>Naslov</th> <th>Autor</th> <th>Izdanje</th> <th>Kategorija</th> <th>Cena</th> <th>Kolicina</th> 
						</tr>
						<tr>
							<td>" . $row['naslov'] ." </td>
							<td>" . $row['autor'] ." </td>
							<td>" . $row['godina'] ." </td>
							<td>" . $row['kategorija'] ." </td>
							<td>" . $row['cena'] ." </td>
							<td>" . $row['kolicina'] ." </td>
						</tr>";
			}
		}
		else 
		{
	    	echo "nema rezultata pretrage! ";
		}
	}	