<?php 
	
	function SanitizeString($var)
	{
		$var = strip_tags($var);
		$var = htmlentities($var);
		$var = stripslashes($var);
		global $conn;
		return $conn->real_escape_string($var);
	}

	function generateKey ()
	{
		$characters = array("q","w","e","r","t","y","u","i","o","p","a","s","d","f","g","h","j","k","l","z","x","c","v","b","n","m");
		$string = "";
		for ($i=0; $i <3 ; $i++) 
		{ 
			$random = rand(0, 25);
			$string .= $characters[$random];
		}

		return $string;		
	}
	function headerNav()
	{	
		$home = "<button onClick=\"location.href='home.php'\">HOME</button>";
		$katalog = "<button onClick=\"location.href='katalog.php'\">Katalog</button>";
		$logout = "";
		$login = "";
		$unos = "";
		$korisnici = "";
		$narudzbine = "";

		if (isset($_SESSION['loggedin']) && isset($_SESSION['level'])) 
		{
			
			if ($_SESSION['loggedin'] == 1) 
			{	
				$logout = "<button onClick=\"location.href='logout.php'\">Logout</button>";			
			}
			else
			{
				$login = "<button onClick=\"location.href='login.php'\">Login</button>";
				
			}
			if ($_SESSION['level'] > 1 ) 
			{
			$unos = "<button onClick=\"location.href='unos.php'\">Unos knjige</button>";
			$korisnici = "<button onClick=\"location.href='korisnici.php'\">korisnici</button>";

			}
			if ($_SESSION['level'] == 3) 
			{
				$narudzbine = "<button onClick=\"location.href='narudzbine.php'\">Narudzbine</button>";
			}

		}
		else
		{
			$login = "<button onClick=\"location.href='login.php'\">Login</button>";
		}
		
			
			
			echo " 	<div>
				 		" . $home . $katalog . $unos . $korisnici . $narudzbine . $logout . $login . "		 		
				 					 		
				 	</div>
				 	
				 	<hr>";
	}


 ?>