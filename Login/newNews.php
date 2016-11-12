<?php require_once("include/session.php");
 require_once("include/connection.php");
 require_once("include/functions.php");
 confirm_logged_in();
/*
$db = mysqli_connect('localhost','root','12345','news')
or die('Error connecting to MySQL server.');

$query = "INSERT INTO `news`(`ID`, `title`, `description`, `date`) VALUES ([value-1],[value-2],[value-3],[value-4])";
mysqli_query($db, $query) or die('Error querying database.');
*/

?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>

<body>
<h1 align="center">Welcome to the News section</h1>
<div class="rating-form">

 <form action="newsDB.php" method="post">
  <input type="text" style="background-color: #caaea6"  name="title" placeholder="TITLE" size="30" align="center"><br/>
  <textarea class="nooResize" name="description" style="background-color: #caaea6" cols="30" placeholder= "DESCRIPTION" rows="5" align="right"></textarea><br/>
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
