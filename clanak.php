<?php
include 'connect.php'; 
define('UPLPATH', 'img/');
$id=$_GET["id"];
echo'
<!DOCTYPE html>
<html>
<head>
	<title>Welt</title>
	<meta charset="UTF-8">
	<meta name="author" content="Filip Raić"/>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<style>
		p{
			margin: 20px auto;
		}
		pre{
			white-space: pre-wrap;
		}
		.flex-container2 > article{
			width: 100%;
			margin: 0 auto;
		}
		@media (max-width: 768px){
			.flex-container2{
				flex-direction: column;
				align-items: center;
				padding: 20px 0;
			}
			.flex-container2 > article{
				width: 80%;
				min-height: 150px;
			}
			#aktivan{
				border-bottom: none;
			}
			img{
				width: 100%;
			}
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
				<li><a href="login.php">Administration</a></li>
			</ul>
		</nav>
	</header>';
	$query = "SELECT * FROM vijesti WHERE id=$id";
	$result = mysqli_query($dbc, $query);
	$row = mysqli_fetch_array($result);
	echo'<h1>' . $row["kategorija"] . '</h1>';
	echo'
	<main>
		<section class="flex-container2">';
				echo'<article>';
					echo'<h2>' . $row["naslov"] . '</h2>';
					echo'<div class="datum">' . $row["datum"] . '</div>';
					echo'<img src="' . UPLPATH . $row["slika"] . '">';
					echo'<p><pre>' . $row["tekst"] . '</pre></p>';
				echo'</article>';
			print'
		</section>
	</main>
	<footer>
		<img class="logo" src="img/logo.png">
	</footer>
	
</body>
</html>'
?>