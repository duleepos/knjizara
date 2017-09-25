<?php 
	session_start();
	include_once('konekcija.php');
	include_once('functions.php');

	$conn = new mysqli($_SESSION['serverName'], $_SESSION['username'], $_SESSION['password'], $_SESSION['database']);

		if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}
	headerNav();

	

	if (isset($_GET['cat'])) 
	{
		$catId = $_GET['cat'];
		$sql = "SELECT * FROM knjige WHERE kategorija = '$catId'";
		$result = $conn->query($sql);
			
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
			else
			{	$sql = "SELECT * FROM knjige";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) 
				{
					while ($row = $result->fetch_assoc()) 
					{
						$kategorijaID = $row['kategorija'];
						if ($kategorijaID == $catId) 
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

				}
				else
				{
					echo "nema rezultata";
				}
			}
		
	}
	else
	{
		$sql = "SELECT * FROM knjige";
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
	}
	$conn->close();

 ?>