<?php
require_once("include/session.php");
require_once("include/connection.php");
require_once("include/functions.php");
include('adminSwitch.php');
confirm_logged_in();

if(isset($_POST{'publish'})) {

    $mainCourse = $_POST['mainCourse'];
    $ingredients = $_POST['ingredients'];
    $price = $_POST['price'];
    $review = $_POST['review'];

    $query = "INSERT INTO menuitems(ID, mainCourse, ingredients, price, review) VALUES ($mainCourse, $ingredients, $price)";
    mysqli_query($connection, $query) or die('Error querying database.');
}
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>
<h2 align="center">Welcome to the Main Course section</h2>
<div class="wrapper" style="margin-left: 25%">

    <form action="newMenu.php" method="post">
        <input type="text" style="background-color: #ffffff" name="maincourse" placeholder="Main Course" size="30" align="center"><br/>
   <!-- <input type="text" style="background-color: #ffffff" name="ingredients" placeholder="Ingredients" size="30" align="right"><br/>  -->
        <textarea class="nooResize" name="ingredients" style="background-color: #ffffff" cols="30" placeholder= "Ingredients" rows="5" align="right"></textarea><br/>
        <style>
            textarea.nooResize
            {
                resize: none;
            }
        </style>
        <input type="number" style="background-color: #ffffff" name="price" placeholder="Price" size="30" align="left"> DKK.-<br/>
        <input type="submit" name="publish" value="Add To Menu!" />
    </form>
</div>
</body>
</html>
