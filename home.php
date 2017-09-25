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
	
	$sql = "SELECT * FROM knjige";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	echo "<table> 
			<tr> <th>Naslov</th> <th>Autor</th> <th>Izdanje</th> <th>Kategorija</th> <th>Cena</th> <th>Kolicina</th> 
			</tr>";
	while ($row = $result->fetch_assoc())
	{	
		if ($row['istaknuta'] == 1) 
		{
			echo "
				<tr>
					<td>" . $row['naslov'] ." </td>
					<td>" . $row['autor'] ." </td>
					<td>" . $row['godina'] ." </td>
					<td>" . $row['kategorija'] ." </td>
					<td>" . $row['cena'] ." </td>
					<td>" . $row['kolicina'] ." </td>
					<td><a href=\"korpa.php?proizvod=" . $row['knjigaID'] . "&cena=" . $row['cena'] . "\">dodaj u korpu</a></td>
				</tr>";
		}
	
	}
	}	
?>	


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php  ?>
</body>
</html>