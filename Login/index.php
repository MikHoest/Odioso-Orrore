<?php require_once("include/session.php");
 require_once("include/connection.php");
 require_once("include/functions.php");
 confirm_logged_in(); ?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>

<body>
<h1 align="center">Welcome to the backend</h1>




<?php include ('menu.php');

if(isset($_GET['page']))
{
 $page = $_GET['page'];
}
else
{
 $page ="index";
}
switch ($page)
{
 default:
  include("home.php");
  break;
 case "newNews";
  include ("newNews.php");
  break;
 case "content";
  include ("content.php");
  break;
}


?>

</body>
</html>

