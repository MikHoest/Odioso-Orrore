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
<h2 align="center">Welcome to the backend</h2>

<?php
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
  include("adminSwitch.php");
  break;
 case "newNews";
  include ("newNews.php");
  break;
 case "newMenu";
  include ("newMenu.php");
     include ("newDrink.php");
     include ("newDailySpecial.php");
  break;
 case "theFrontpage";
  include ("../front.php");
  break;
}
?>

</body>
</html>

