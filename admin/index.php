<?php
require_once("include/session.php");
require_once("include/connection.php");
require_once("include/functions.php");
confirm_logged_in();
?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>

<body>
<h1 align="center">Welcome to the backend</h1>

<?php
include ('menu.php');//why is this shit here?

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
  include("menu.php"); //what the f*ck is this? was ..home.php.. changed to ..menu.php..
  break;
 case "newNews";
  include ("newNews.php");
  break;
 case "newMenu";
  include ("newMenu.php");
  break;
 case "theFrontpage";
  include ("../front.php");
  break;
}


?>

</body>
</html>

