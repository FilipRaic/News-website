<?php
include 'connect.php'; 
define('UPLPATH', 'img/');
echo'
<!DOCTYPE html>
<html>
<head>
    <title>Welt - New article</title>
	<meta charset="UTF-8">
	<meta name="author" content="Filip Raić"/>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<style>
		footer{
			position: relative;
			bottom: 0;
		}
		form{
			width: 40%;
		}
		.form-field{
			margin-top: 15px;
		}
		label{
			font-weight: bold;
		}
		textarea{
			height: 200px;
		}
		@media (max-width: 768px){
			form{
				width: 90%;
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
				<li id="aktivan"><a href="unos.php">New article</a></li>
			</ul>
		</nav>
    </header>
	<main>
		<section>
			<form enctype="multipart/form-data" method="POST" id="unos"> 
				<div class="form-item">
					<span id="porukaTitle" class="bojaPoruke"></span> 
						<label for="title">Headline</label> 
					<div class="form-field"><input type="text" name="title" id="title" cols="105" class="form-field-textual"></div> 
				</div> 
				<div class="form-item">
					<span id="porukaAbout" class="bojaPoruke"></span> 
						<label for="about">Short description (up to 50 charaters)</label> 
					<div class="form-field"><textarea name="about" id="about" cols="115" rows="10" class="form-field-textual"></textarea></div> 
				</div> 
				<div class="form-item">
					<span id="porukaContent" class="bojaPoruke"></span> 
						<label for="content">Content</label> 
					<div class="form-field"><textarea name="content" id="content" cols="115" rows="10" class="form-field-textual"></textarea></div> 
				</div>
				<div class="form-item">
					<span id="porukaSlika" class="bojaPoruke"></span> 
						<label for="picture">Picture: </label> 
					<div class="form-field"><input type="file" accept="image/jpg,image/png" id="picture" name="picture"/></div> 
				</div> 
				<div class="form-item">
					<span id="porukaKategorija" class="bojaPoruke"></span> 
						<label for="category">News category</label>
				<div class="form-field"><select name="category" id="category" class="form-field-textual">
					<option value="" disabled selected>Category</option> 
					<option value="Politics">Politics</option> 
					<option value="Food">Food</option> 
				</select> 
				</div> 
				</div> 
				<div class="form-item"> 
					<label>Archive: <div class="form-field"><input type="checkbox" name="arhiva" class="kvacica"></div></label> 
				</div> 
				<div class="form-item"> 
					<input type="reset" value="Cancel" class="gumb">
					<input type="submit" value="Submit" class="gumb" name="submit" id="submit">
				</div>
			</form>
		</section>
	</main>

    <script type="text/javascript"> 
        document.getElementById("submit").onclick = function(event)
		{
            var slanjeForme = true; 
             
            var poljeTitle = document.getElementById("title"); 
            var title = document.getElementById("title").value; 
            if (title.length < 5 || title.length > 30) {
                slanjeForme = false; 
                poljeTitle.style.border="1px dashed red"; 
                document.getElementById("porukaTitle").innerHTML="Headline must be between 5 and 30 charaters!<br>"; 
                } else {
                    poljeTitle.style.border="1px solid green";
                    document.getElementById("porukaTitle").innerHTML=""; 
                } 
            var poljeAbout = document.getElementById("about"); 
            var about = document.getElementById("about").value; 
            if (about.length < 10 || about.length > 50) {
                slanjeForme = false; 
                poljeAbout.style.border="1px dashed red";
                document.getElementById("porukaAbout").innerHTML="Short description must be no longer than 50 charaters!<br>"; 
                } else { 
                    poljeAbout.style.border="1px solid green"; 
                    document.getElementById("porukaAbout").innerHTML=""; 
                } 
            var poljeContent = document.getElementById("content"); 
            var content = document.getElementById("content").value; 
            if (content.length == 0) { 
                slanjeForme = false; 
                poljeContent.style.border="1px dashed red"; 
                document.getElementById("porukaContent").innerHTML="Content must be set!<br>"; 
                } else { 
                    poljeContent.style.border="1px solid green";
                    document.getElementById("porukaContent").innerHTML=""; 
                } 
            var poljeSlika = document.getElementById("picture"); 
            var picture = document.getElementById("picture").value; 
            if (picture.length == 0) {
                slanjeForme = false; 
                poljeSlika.style.border="1px dashed red"; 
                document.getElementById("porukaSlika").innerHTML="A picture must be set!<br>"; 
                } else { 
                    poljeSlika.style.border="1px solid green"; 
                    document.getElementById("porukaSlika").innerHTML=""; 
                } 
            var poljeCategory = document.getElementById("category"); 
            if(document.getElementById("category").selectedIndex == 0) {
                slanjeForme = false; 
                poljeCategory.style.border="1px dashed red"; 
                document.getElementById("porukaKategorija").innerHTML="Category must be selected!<br>"; 
                } else { 
                    poljeCategory.style.border="1px solid green"; 
                    document.getElementById("porukaKategorija").innerHTML=""; 
                } 
            if (slanjeForme != true) {
                event.preventDefault(); 
            } 
        };
    </script>';

    if(isset($_POST["submit"]))
	{
		$datum=date('d.m.Y.'); 
		$naslov=$_POST['title'];
		$sazetak=$_POST['about']; 
		$tekst=$_POST['content']; 
		$picture = $_FILES['picture']['name']; 
		$category=$_POST['category']; 

		if(isset($_POST['arhiva']))
			$arhiva=1; 
		else
			$arhiva=0; 
		
		$target_dir = "img/";
		$target_file = $target_dir . basename($_FILES["picture"]["name"]);
		move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
		
		$query = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva ) VALUES ('$datum', '$naslov', '$sazetak', '$tekst', '$picture', '$category', '$arhiva')"; 
		$result = mysqli_query($dbc, $query) or die('Error querying database.'); 
		
		mysqli_close($dbc);
    } 
	
	print'
    <footer>
		<img class="logo" src="img/logo.png">
	</footer>
</body>
</html>';
?>