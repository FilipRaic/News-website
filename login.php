<?php
include 'connect.php'; 
define('UPLPATH', 'img/');
echo'
<!DOCTYPE html>
<html>
<head>
	<title>Welt Administracija</title>
	<meta charset="UTF-8">
	<meta name="author" content="Filip Raić"/>
	<link rel="stylesheet" type="text/css" href="style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<script src="js/login-validate.js"></script>
	<style>
		.gumb{
			width: 70%;
			margin-bottom: 10px;
		}
		#link{
			position: absolute;
			top: 500px;
		}
		#link > a{
			text-transform: uppercase;
			color: black;
			font-weight: bold;
			text-decoration: none;
		}
		#link > a:hover{
			text-shadow: none;
			opacity: 0.8;
		}
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
	<script>
		function page()
		{
			window.location.href="registracija.php";
		}
	</script>
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
			<form method="POST" name="prijava">
				<label for="user">Username</label><br/>
				<input name="user" id="user" type="text"/><br/>
				<label for="password">Password</label><br/>
				<input name="password" id="password" type="password"/><br/>
				<input name="submit" class="gumb" type="submit" value="Log in">
				<input type="button" class="gumb" onClick="page()" value="Sign Up">
			</form>';
		
	session_start();
	if ($dbc)
	{
        if(isset($_POST["submit"]))
		{
            $user = $_POST["user"];
            $password = $_POST["password"];
            $query = "SELECT username, password, razina FROM korisnik WHERE username = ?;";
            $stmt = mysqli_stmt_init($dbc);

            if (mysqli_stmt_prepare($stmt, $query))
			{
                mysqli_stmt_bind_param($stmt, 's', $user);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                mysqli_stmt_bind_result($stmt, $username, $hash, $razina);
                mysqli_stmt_fetch($stmt);

                if(password_verify($password, $hash))
				{
                    if($razina)
					{
                        header("Location: administracija.php");
                        $_SESSION["username"] = $user;
                        $_SESSION["level"] = $password;
                    }
					else
					{
                        echo "<div id='link'>You don't have admin privilidges!</div>";
                    }
                }
				else
				{
                    echo "<div id='link'><br>You have enter an invalid username or password.</div>";
                }
                mysqli_stmt_close($stmt);
            }
        }
    }
    mysqli_close($dbc);
			print'
		</section>
	</main>
	<footer>
		<img class="logo" src="img/logo.png">
	</footer>
	
</body>
</html>'
?>