<?php
include 'connect.php'; 
define('UPLPATH', 'img/');
$kategorija=$_GET["kategorija"];
echo'
<!DOCTYPE html>
<html>
<head>
	<title>Welt '.$kategorija.'</title>
	<meta charset="UTF-8">
	<meta name="author" content="Filip Raić"/>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<style>
		.flex-container2{
			flex-direction: column;
			align-items: center;
			padding: 20px 0;
		}
		.flex-container2 > article{
			width: 80%;
			min-height: 150px;
		}
	</style>
</head>
<body>
	<header>
		<img class="logo" src="img/logo.png">
		<nav>
			<ul class="flex-container1">
				<li><a href="index.php">Home</a></li>';
				if($kategorija=="Politics")
				{
					echo'<li id="aktivan"><a href="kategorija.php?kategorija=Politics">Politics</a></li>
						<li><a href="kategorija.php?kategorija=Food">Food</a></li>';
				}
				else
				{
					echo'<li><a href="kategorija.php?kategorija=Politics">Politics</a></li>
						<li id="aktivan"><a href="kategorija.php?kategorija=Food">Food</a></li>';
				}echo'
				<li><a href="login.php">Administration</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<h1>'.$kategorija.'</h1>
		<section class="flex-container2">';
			$query = "SELECT * FROM vijesti WHERE kategorija='$kategorija'";
			$result = mysqli_query($dbc, $query);
			while($row = mysqli_fetch_array($result))
			{
				echo'<article>';
					echo'<img style="width: 100%; min-height: 150px;" src="' . UPLPATH . $row["slika"] . '">';
					echo'<a id="clanak" href="clanak.php?id='.$row["id"].'"><h2>' . $row["naslov"] . '</h2></a>';
					echo'<p>' . $row["sazetak"] . '</p>';
					echo'<div class="datum">' . $row["datum"] . '</div>';
				echo'</article>';
			}
			print'
		</section>
	</main>
	<footer>
		<img class="logo" src="img/logo.png">
	</footer>
	
</body>
</html>'
?>