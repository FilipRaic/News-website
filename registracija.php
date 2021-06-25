<?php
include 'connect.php'; 
define('UPLPATH', 'img/');
echo'
<!DOCTYPE html>
<html>
<head>
	<title>Welt Registracija</title>
	<meta charset="UTF-8">
	<meta name="author" content="Filip Raić"/>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<script src="js/registration-validate.js"></script>
	<style>
		footer{
			position: fixed;
			bottom: 0;
		}
		form{
			width: 50%;
		}
	</style>
</head>
<body>
	<header>
		<img class="logo" src="img/logo.png">
		<nav>
			<ul class="flex-container1">
				<li><a href="index.php">Home</a></li>
				<li><a href="kategorija.php?kategorija=Politics">Politics</a></li>
				<li><a href="kategorija.php?kategorija=Food">Food</a></li>
				<li id="aktivan"><a href="login.php">Administration</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<section class="flex-container2">
			<form method="POST" name="prijava" enctype="multipart/form-data">
				<label for="ime">Name</label><br/>
				<input name="ime" id="ime" type="text"/><br/>
				<label for="prezime">Surname</label><br/>
				<input name="prezime" type="text"  /><br/>
				<label for="user">Username</label><br/>
				<input name="user" type="text"  /><br/>
				<label for="password">Password</label><br/>
				<input name="password" id="password" type="password" /><br/>
				<label for="password1">Repeat password</label><br/>
				<input name="password1" id="password1" type="password" /><br/>
				<input name="submit" type="submit" class="gumb" value="Sign up" />
			</form>';
		if($dbc)
		{
			if(isset($_POST["submit"]))
			{
				$ime = $_POST["ime"];
				$prezime = $_POST["prezime"];
				$user = $_POST["user"];
				$password = $_POST["password"];
				$hashPassword = password_hash($password, CRYPT_BLOWFISH);
				
				$query = "SELECT username FROM korisnik WHERE username = '$user';";
				$result = mysqli_query($dbc, $query) or die("Error");

				if(mysqli_num_rows($result) >= 1)
					echo "Korisničko ime se već koristi";
				else
				{
					$sql = "INSERT INTO korisnik (ime, prezime, username, password) values (?, ?, ?, ?)";
					$stmt = mysqli_stmt_init($dbc);

					if(mysqli_stmt_prepare($stmt, $sql))
					{
						mysqli_stmt_bind_param($stmt, 'ssss', $ime, $prezime, $user, $hashPassword);
						mysqli_stmt_execute($stmt);
						echo "Unos je uspješan";
					}
				}
			}
		}
		mysqli_close($dbc);
		
	print'
			</article>
		</section>
	</main>
	<footer>
		<img class="logo" src="img/logo.png">
	</footer>
	
</body>
</html>'
?>