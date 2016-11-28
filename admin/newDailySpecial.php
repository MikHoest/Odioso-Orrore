<?php
require_once("include/session.php");
require_once("include/connection.php");
require_once("include/functions.php");
include('adminSwitch.php');
confirm_logged_in();

$query = "INSERT INTO dailyspecial(ID, dailySpecial, ingredients, price, review) VALUES ([],[$dailyspecial],[$ingredients],[$price], [review])";
mysqli_query($connection, $query) or die('Error querying database.');

$dailyspecial=$row['dailySpecial'];
$ingredients=$row['ingredients'];
$price=$row['price'];
$review=$row['review'];

?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>
<h1 align="center">Welcome to the NewMenu section</h1>
<div class="wrapper">

    <form action="newDrink.php" method="post">
        <input type="text" style="background-color: #ffffff" name="dailySpecial" placeholder="Daily Special" size="30" align="center">.$dailyspecial.<br/>
        <!-- <input type="text" style="background-color: #ffffff" name="ingredients" placeholder="Ingredients" size="30" align="right"><br/>  -->
        <textarea class="nooResize" name="ingredients" style="background-color: #ffffff" cols="30" placeholder= "Ingredients" rows="5" align="right">.$ingredients.</textarea><br/>
        <style>
            textarea.nooResize
            {
                resize: none;
            }
        </style>
        <input type="number" style="background-color: #ffffff" name="price" placeholder="Price" size="30" align="left">." DKK.-"<br/>
        <input type="submit" name="submit" value="Add To Drinks!" />
    </form>
</div>
</body>
</html>
