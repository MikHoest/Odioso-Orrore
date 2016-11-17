<?php
require_once("../admin/include/session.php");
require_once("../admin/include/connection.php");
require_once("../admin/include/functions.php");
confirm_logged_in();
/*
$db = mysqli_connect('localhost','root','12345','news')
or die('Error connecting to MySQL server.');

$query = "INSERT INTO `news`(`ID`, `title`, `description`, `date`) VALUES ([],[$title],[$description],[$date])";
mysqli_query($db, $query) or die('Error querying database.');

$title=$row['title'];
$description=$row['description'];
$date=$row['date'];

*/
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
  <textarea class="nooResize" name="description" style="background-color: #ffffff" cols="30" placeholder= "DESCRIPTION" rows="5"></textarea><br/>
  <style>
   textarea.nooResize
   {
    resize: none;
   }
  </style>
  <input type="submit" name="submit" value="Publish" />
 </form>
</div>
</body>
</html>
