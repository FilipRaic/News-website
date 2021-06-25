<?php
include 'connect.php'; 
define('UPLPATH', 'img/');
echo'
<!DOCTYPE html>
<html>
<head>
	<title>Welt</title>
	<meta charset="UTF-8">
	<meta name="author" content="Filip Raić"/>
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
	<header>
		<img class="logo" src="img/logo.png">
		<nav>
			<ul class="flex-container1">
				<li id="aktivan"><a href="index.php">Home</a></li>
				<li><a href="kategorija.php?kategorija=Politics">Politics</a></li>
				<li><a href="kategorija.php?kategorija=Food">Food</a></li>
				<li><a href="login.php">Administration</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<h1>Politics</h1>
		<section class="flex-container2">';
			$query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='politics' LIMIT 3";
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
		<h1>Food</h1>
		<section class="flex-container2">';
			$query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='food' LIMIT 3";
			$result = mysqli_query($dbc, $query);
			while($row = mysqli_fetch_array($result))
			{
				echo'<article>';
					echo'<img style="width: 100%; min-height: 150px;" src="' . UPLPATH . $row["slika"] . '">';
					echo'<a id="clanak" href="clanak.php?id='.$row['id'].'"><h2>' . $row["naslov"] . '</h2></a>';
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