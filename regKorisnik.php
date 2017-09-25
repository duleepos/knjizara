<?php 

	include_once('konekcija.php');

	$conn = new mysqli($_SESSION['serverName'], $_SESSION['username'], $_SESSION['password'], $_SESSION['database']);

	if (!empty($_POST['name'])) 
	{
		if (!empty($_POST['lastName'])) 
		{
			if (!empty($_POST['password'])) 
			{
				if (!empty($_POST['address'])) 
				{
					$name = $_POST['name']; 
					$lastName = $_POST['lastName'];
					$password = $_POST['password'];
					$address = $_POST['address'];
					$level = 1;
					$block = 0;

					$sql = "INSERT INTO korisnici (ime, prezime, sifra, adresa, nivo, blokiran) VALUES ('$name', '$lastName', '$password', '$address', '$level', '$block')";
					$conn->query($sql);
					header('location: login.php');



				}
				else
				{
					echo "Unesite adresu! <br/>";
					echo " <button onClick=\"location.href='registracija.php'\">nazad</button>";
				}
			}
			else
			{
				echo "Unesite sifru! <br/>";
				echo " <button onClick=\"location.href='registracija.php'\">nazad</button>";
			}
		}
		else
		{
			echo "Unesite Prezime! <br/>";
			echo " <button onClick=\"location.href='registracija.php'\">nazad</button>";
		}
	}
	else
	{
		echo "Unesite Ime! <br/>";
		echo " <button onClick=\"location.href='registracija.php'\">nazad</button>";
	}


 ?>