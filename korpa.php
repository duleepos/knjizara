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
	if ( isset($_GET['proizvod']) && isset($_GET['cena']) )
	{
		$knjiga = $_GET['proizvod'];
		$sql = "SELECT * FROM knjige WHERE knjigaID = $knjiga ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{
			
		
			echo "<table> 
					<tr> <th>Naslov</th> <th>Autor</th> <th>Izdanje</th> <th>Kategorija</th> <th>Cena</th> <th>Kolicina</th> 
					</tr>";
		$row = $result->fetch_assoc();
		
				echo "
					<tr>
						<td>" . $row['naslov'] ." </td>
						<td>" . $row['autor'] ." </td>
						<td>" . $row['godina'] ." </td>
						<td>" . $row['kategorija'] ." </td>
						<td>" . $row['cena'] ." </td>
						<td>" . $row['kolicina'] ." </td>
						
					</tr>
					</table>
					<br/>";

					echo "<a href=\"kupi.php?proizvod=" . $row['knjigaID'] . "&cena=" . $row['cena'] .  "\">Kupi</a>";
		
		}
	}
?>	