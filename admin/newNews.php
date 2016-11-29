<?php
require_once("include/session.php");
require_once("include/connection.php");
require_once("include/functions.php");
include('adminSwitch.php');
confirm_logged_in();

if(isset($_POST{'publish'})) {

 $title = $_POST['title'];
 $description = $_POST['description'];

 $query = "INSERT INTO `news`(`title`, `description`) VALUES ('$title', '$description')";

 mysqli_query($connection, $query) or die('Error querying database.');
}
?>

<head>
 <!DOCTYPE html>
 <html lang="en" xmlns="http://www.w3.org/1999/html">

  <meta charset="UTF-8">
  <title>Odioso Orrore</title>
  <link rel="stylesheet" type="text/css" href="bootstrap" />
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
  <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

</head>
 </html>
<body>
<h1>Welcome to the News section</h1>
<div class="wrapper">

 <form action="newNews.php" method="post">
  <h2 align="left">Publish New News</h2>
  <input type="text" style="background-color: #ffffff" name="title" placeholder="TITLE" size="30"><br/>
  <textarea class="nooResize" name="description" style="background-color: #ffffff" cols="30" placeholder= "DESCRIPTION" rows="5"></textarea><br/> <!--Is this the right way to insert into a DB?-->
  <style>
   textarea.nooResize
   {
    resize: none;
   }
  </style>
  <input type="submit" name="publish" value="Publish" />
 </form>
</div>
</body>

