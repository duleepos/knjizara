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
	if (!empty($_GET['cat'])) 
	{
		$str = "<input type=\"hidden\" name=\"cat\" value=\"" . $_GET['cat'] ."\">";
	}
	else
	{	
		$str = "";
	}
	echo "<div align=\"right\">

			 		 <form name=\"search\" action=\"katalog.php\" method=\"GET\">
			 		 	<input type=\"text\" name=\"pretraga\">
			 		 	 " . $str ."
			 		 	<input type=\"submit\" value=\"pretraga\">



			 		 </form>
			 	</div>";
	$sql = "SELECT * FROM kategorije";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
		while ($row = $result->fetch_assoc()) 
		{
			$catId = $row['kategorijaID'];
			$catName = $row['naziv'];
			echo "<a href=\"katalog.php?cat=" . $catId . "\">" . $catName . "</a> | ";
		}
	}

	
			
	

	if (!empty($_GET['cat']) && !empty($_GET['pretraga'])) 
	{
		$pretraga1 = $_GET['cat'];
		$pretraga = $_GET['pretraga'];
		$sql = "SELECT * FROM knjige WHERE kategorija = $pretraga1 AND (naslov like '%$pretraga%' or autor like '%$pretraga%')";
	}
	else
	{	
		if (!empty($_GET['pretraga'])) 
		{
			$pretraga = $_GET['pretraga'];
			$sql = "SELECT * FROM knjige WHERE naslov like '%$pretraga%' or autor like '%$pretraga%'";
		}
		else
		{	
			if (!empty($_GET['cat'])) 
			{
				$pretraga1 = $_GET['cat'];
				$sql = "SELECT * FROM knjige WHERE kategorija = $pretraga1";
			}
			else
			{	
				$sql = "SELECT * FROM knjige";
			}
		}
		
	}
	
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
		if (isset($_SESSION['level'])) 
		{
			if ($_SESSION['level'] == 1) 
			{
			 	$kol1 = "";
			 }
			 else
			 {
			 	$kol1 = "<th>Kolicina</th> ";
			 } 
		}
		else
		{
			$kol1 = "";
		}
		echo "<table> 
					<tr> <th>Naslov</th> <th>Autor</th> <th>Izdanje</th> <th>Kategorija</th> <th>Cena</th>" . $kol1 . "
					</tr>";
		while ($row = $result->fetch_assoc()) 
		{ 
			if (isset($_SESSION['level'])) 
		{
			if ($_SESSION['level'] == 1) 
			{
			 	$kol = "";
			 }
			 else
			 {
			 	$kol = "<td>" . $row['kolicina']. " </td>";
			 } 
		}
		else
		{
			$kol = "";
		}
		if (isset($_SESSION['level'])) 
		{
			if ($_SESSION['level'] > 1) 
			{
				$dugmad = "<td><button onClick=\"location.href='brisanje.php?knjiga=".$row['knjigaID']."'\">Brisi</button></td>
							<td><button onClick=\"location.href='promeni.php'\">Promeni</button></td>";
				if ($row['istaknuta'] == 1) 
				{
					$star = "<td><a href=\"ukloniIstaknuto.php?knjiga=". $row['knjigaID'] . "\"><img src=\"stargold.png\"></a> </td>";
				}
				else
				{
					$star = "<td><a href=\"dodajIstaknuto.php?knjiga=". $row['knjigaID'] . "\"><img src=\"stargray.png\"></a> </td>";
				}
			}
		}
		else
		{
			$dugmad = "";
			$star = "";
		}
		

				echo "
					<tr>
						<td>" . $row['naslov'] ." </td>
						<td>" . $row['autor'] ." </td>
						<td>" . $row['godina'] ." </td>
						<td>" . $row['kategorija'] ." </td>
						<td>" . $row['cena'] ." </td> " . 
						$kol . "
						<td><a href=\"korpa.php?proizvod=" . $row['knjigaID'] . "&cena=" . $row['cena'] . "\">dodaj u korpu</a></td>" . $dugmad . $star . " 
						
					</tr>";
		
		}

	}
	else
	{
		echo "nema rezultata";
	}
		
	
	$conn->close();

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