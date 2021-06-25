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
	<style>
		.form-field{
			margin-top: 15px;
		}
		form{
			border-bottom: 1px solid lightgray;
		}
		label{
			font-weight: bold;
		}
		textarea{
			height: 200px;
		}
		.flex-container2{
			flex-direction: column;
			align-items: center;
			padding: 20px 0;
		}
		.flex-container2 > article{
			width: 80%;
			min-height: 150px;
		}
		#gumb{	
			width: 75px;
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
				<li><a href="unos.php">New article</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<section class="flex-container2">';
			$query = "SELECT * FROM vijesti";
			$result = mysqli_query($dbc, $query);
			
			session_start();
			$user = $_SESSION['username'];

			if(strtolower($user)!="admin")
				echo "Nemate ovlasti";

			while($row = mysqli_fetch_array($result))
			{
			echo'<article>
				<form enctype="multipart/form-data" method="POST" id="unos">
					<div class="form-item"> 
						<label for="title">Naslov vijesti</label> 
						<div class="form-field"> 
							<input type="text" name="title" cols="105" class="form-field-textual" value="'.$row['naslov'].'"> 
						</div> 
					</div> 
					<div class="form-item"> 
						<label for="about">Kratki sadržaj vijesti (do 50 znakova)</label> 
						<div class="form-field"> 
							<textarea name="about" id="" cols="120" rows="10" class="form-field-textual">'.$row['sazetak'].'</textarea> 
						</div> 
					</div> 
					<div class="form-item"> 
						<label for="content">Sadržaj vijesti</label> 
						<div class="form-field"> 
							<textarea name="content" id="" cols="120" rows="10" class="form-field-textual">'.$row['tekst'].'</textarea> 
						</div> 
					</div>
					<div class="form-item"> 
						<label for="picture">Slika: </label> 
						<div class="form-field"> 
							<input type="file" accept="image/jpg,image/png" id="picture" 
							value="'.$row['slika'].'" name="picture"/> <br><img src="' . UPLPATH . $row['slika'] . '" width=70%/> 
						</div> 
					</div><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
					<div class="form-item"> 
						<label for="category">Kategorija vijesti</label>
						<div class="form-field"> 
							<select name="category" id="" class="form-field-textual" value="'.$row['kategorija'].'">';
								if($row['kategorija']=="Politics")
								{
									echo'<option value="Politics">Politics</option>';
									echo'<option value="Food">Food</option>';
								}
								else
								{
									echo'<option value="Food">Food</option>';
									echo'<option value="Politics">Politics</option>';
								}
								echo'
							</select> 
						</div> 
					</div> 
					<div class="form-item"> 
						<label>Spremiti u arhivu: 
							<div class="form-field">';
						if($row['arhiva'] == 0)
							echo '<input type="checkbox" name="arhiva" id="archive" class="kvacica"/>';
						else
							echo '<input type="checkbox" name="arhiva" id="archive" class="kvacica" checked/>';
						echo'</div> 
						</label> 
					</div> 
					<div class="form-item">
						<input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'">
						<input id="gumb" type="reset" value="Poništi">
						<input id="gumb" type="submit" name="update" value="Prihvati">
						<input id="gumb" type="submit" name="delete" value="Izbriši">
					</div>
				</form>';
			}
    if(isset($_POST['delete']))
	{
		$id=$_POST['id'];
		$query = "DELETE FROM vijesti WHERE id=$id ";
		$result = mysqli_query($dbc, $query);
    }
    if(isset($_POST["update"]))
	{
		$id=$_POST['id'];
		$datum=date('d.m.Y.'); 
		$naslov=$_POST['title'];
		$sazetak=$_POST['about']; 
		$tekst=$_POST['content']; 
		$picture = $_FILES['picture']['name']; 
		$kategorija=$_POST['category']; 
		
		if(isset($_POST['arhiva']))
			$arhiva=1; 
		else
			$arhiva=0; 

		$target_dir = "img/";
		$target_file = $target_dir . basename($_FILES["picture"]["name"]);
		move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
		
		$query = "UPDATE vijesti SET datum='$datum', naslov='$naslov', sazetak='$sazetak', tekst='$tekst', slika='$picture', 
			kategorija='$kategorija', arhiva='$arhiva' WHERE id=$id "; 
		$result = mysqli_query($dbc, $query)
			or die('Error querying database.'); 
			
		mysqli_close($dbc);
    }
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