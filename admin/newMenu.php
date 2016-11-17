<?php
require_once("../admin/include/session.php");
require_once("../admin/include/connection.php");
require_once("../admin/include/functions.php");
confirm_logged_in();




//$db = mysqli_connect('DB_SERVER','DB_USER','DB_PASS','DB_NAME') //C-PANEL DATABASE
$db = mysqli_connect('DB_SERVER_X','DB_USER_X','DB_PASS_X','DB_NAME_X') //LOCAL DATABASE
or die('Error connecting to MySQL server.');

$query = "INSERT INTO `news`(`ID`, `title`, `description`, `date`) VALUES ([],[$title],[$description],[$date])";
mysqli_query($db, $query) or die('Error querying database.');

$title=$row['title'];
$description=$row['description'];
$date=$row['date'];

?>


<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>

<body>
<h1 align="center">Welcome to the NewMenu section</h1>
<div class="rating-form">

    <form action="newMenu.php" method="post">
        <input type="text" style="background-color: #caaea6"  name="name" placeholder="Name" size="30" align="center"><br/>
        <input type="text" style="background-color: #caaea6" name="email" placeholder="Email" size="30" align="right"><br/>
        <textarea class="nooResize" name="message" style="background-color: #caaea6" cols="30" placeholder= "Message" rows="5" align="right"></textarea><br/>
        <style>
            textarea.nooResize
            {
                resize: none;
            }
        </style>
        <input type="submit" name="submit" value="SEND!" />
    </form>
</div>
</body>
</html>
