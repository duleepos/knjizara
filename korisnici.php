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
	
	$sql = "SELECT * FROM korisnici";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
		echo "<table> 
			<tr> <th>Ime</th> <th>Prezime</th> <th>adresa</th> <th>nivo</th> <th>blokiran</th> 
			</tr>";
		while ($row = $result->fetch_assoc())
		{	
			if ($_SESSION['level'] == 3 && $row['nivo'] == 1 && $row['blokiran'] == 0) 
			{
				$mod = "<td><a href=\"dodajModeratora.php?korisnik=" . $row['korisnikID'] . "\">Postavi za moderatora</a></td>";	
			}
			else
			{
				$mod = "";
			}
			if ($_SESSION['level'] == 3 && $row['nivo'] == 2 && $row['blokiran'] == 0) {
				$mod1 = "<td><a href=\"ukloniModeratora.php?korisnik=" . $row['korisnikID'] . "\">Ukloni moderatora</a></td>";
			}
			else
			{
				$mod1 = "";
			}
			if ($row['blokiran'] == 0 && $_SESSION['accountId'] != $row['korisnikID'] && $row['nivo'] == 1)
			{
				$blok = "<td><a href=\"dodajBlok.php?korisnik=" . $row['korisnikID'] . "\">Blokiraj korisnika</a></td>";	
			}
			else
			{
				$blok = "";
			}
			if ($row['blokiran'] == 1)
			{
				$blok1 = "<td><a href=\"ukloniBlok.php?korisnik=" . $row['korisnikID'] . "\">Ukini blok</a></td>";	
			}
			else
			{
				$blok1 = "";
			}
				echo "<tr>
						<td>" . $row['ime'] ." </td>
						<td>" . $row['prezime'] ." </td>
						<td>" . $row['adresa'] ." </td>
						<td>" . $row['nivo'] ." </td>
						<td>" . $row['blokiran'] ." </td>" . $mod . $mod1 . $blok . $blok1 . "
					</tr>";	
			
		
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