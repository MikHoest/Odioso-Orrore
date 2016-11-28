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


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>

<body>
<h1 align="center">Welcome to the News section</h1>
<div class="rating-form">

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
</html>
