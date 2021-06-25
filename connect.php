<?php
	$servername = "localhost:3307"; 
	$username = "root"; 
	$password = ""; 
	$basename = "welt";  
	
	$dbc = mysqli_connect($servername, $username, $password, $basename)
		or die('Error connecting to MySQL server.'.mysqli_error()); 
		
	mysqli_set_charset($dbc, "utf8");
?>