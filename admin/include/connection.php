<?php 
require("constants.php");

//$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME); //C-PANEL DATABASE
$connection = mysqli_connect(DB_SERVER_X,DB_USER_X,DB_PASS_X,DB_NAME_X); // LOCAL DATABASE
	if (mysqli_connect_errno($connection))
		{
		die ("Failed to connect to MySQL: " . mysqli_connect_error());
		}

