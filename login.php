<?php 
	session_start();
	include_once('konekcija.php');
	include_once('functions.php');
	
	if (!empty($_POST['name']) && !empty($_POST['password'])) 
	{
		$conn = new mysqli($_SESSION['serverName'], $_SESSION['username'], $_SESSION['password'], $_SESSION['database']);

		if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}

		$name = SanitizeString($_POST['name']);
		$password = SanitizeString($_POST['password']);
		$sql = "SELECT * FROM korisnici WHERE ime = '$name'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
			$row = $result->fetch_assoc();
			$hash = $row['sifra'];
			if ($row['blokiran'] == 0) 
			{
				if ($password == $hash) 
				{
					$_SESSION['loggedin'] = 1;
					$_SESSION['accountName'] = $row['ime'];
					$_SESSION['accountId'] = $row['korisnikID'];
					$_SESSION['level'] = $row['nivo'];
					header('Location: home.php');
					
				}
				else
				{
					echo "password is not valid";
				}
				

			}
			else
			{
				echo "Korisnik je blokiran";
			}
			
			
		}
		else
		{
			echo "Korisnik " . $name . " ne postroji! <br/><br/>";
		}

	}
	


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<form name="logForma" action="login.php" method="post">
		<label>Unesite vase ime:</label> <br/>
		<input type="text" name="name"> <br/>
		<label>Unesite sifru:</label> <br/>
		<input type="password" name="password"><br/><br/>
		
		
		<input type="submit"><br/><br/><br/>
	</form>
	<button onClick="location.href='registracija.php'">Registruj se</button>

 </body>
 </html>