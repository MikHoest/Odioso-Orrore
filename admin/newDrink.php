<?php
require_once("include/session.php");
require_once("include/connection.php");
require_once("include/functions.php");
include('adminSwitch.php');
confirm_logged_in();

if(isset($_POST{'publish'})) {

    $drink = $row['drink'];
    $ingredients = $row['ingredients'];
    $price = $row['price'];
    $review = $row['review'];

    $query = "INSERT INTO drinks(ID, drink, ingredients, price, review) VALUES ($drink,$ingredients,$price, review)";
    mysqli_query($connection, $query) or die('Error querying database.');

}

?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>
<h1 align="left">Welcome to the New Drink section</h1>
<div class="wrapper">

    <form action="newDrink.php" method="post">
        <input type="text" style="background-color: #ffffff" name="drink" placeholder="Drink" size="30" align="center"><br/>
        <!-- <input type="text" style="background-color: #ffffff" name="ingredients" placeholder="Ingredients" size="30" align="right"><br/>  -->
        <textarea class="nooResize" name="ingredients" style="background-color: #ffffff" cols="30" placeholder= "Ingredients" rows="5" align="right"></textarea><br/>
        <style>
            textarea.nooResize
            {
                resize: none;
            }
        </style>
        <input type="number" style="background-color: #ffffff" name="price" placeholder="Price" size="30" align="left"> DKK.-<br/>
        <input type="submit" name="publish" value="Add To Drinks!" />
    </form>
</div>
</body>
</html>
