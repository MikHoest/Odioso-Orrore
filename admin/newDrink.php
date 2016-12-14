<?php
require_once("include/session.php");
require_once("include/connection.php");
require_once("include/functions.php");
include('adminSwitch.php');
confirm_logged_in();

if(isset($_POST{'publish'})) {

    $drink = $_POST['drink'];
    $ingredients = $_POST['ingredients'];
    $price = $_POST['price'];
    //$review = $_POST['review'];
    $picture = $_POST['picture'];

    $query = "INSERT INTO drinks(`drink`, `ingredients`, `price`, `picture`) VALUES ($drink,$ingredients,$price, $picture)";
    mysqli_query($connection, $query) or die('Error querying database.');

}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; char    set=ISO-8859-15" />
</head>
<body>
<div class="wrapper" style="background-color: #237d35; background-image: none; opacity: 0.8;">
    <h4 align="center">New Drink section</h4>
    <form action="newDrink.php" method="post">
        <input type="text" style="background-color: #ffffff" name="drink" placeholder="Drink" size="30" align="center"><br/>
        <textarea class="nooResize" name="ingredients" style="background-color: #ffffff" cols="30" placeholder= "Ingredients" rows="5" align="right"></textarea><br/>
        <style>
            textarea.nooResize
            {
                resize: none;
            }
        </style>
        <input type="number" style="background-color: #ffffff" name="price" placeholder="Price" size="30" align="left"> DKK.-<br/>
        <form action="upload_file.php" method="post" enctype="multipart/form-data">
            <label for="file">PICTURE --><input type="file" name="picture"></label>
        </form>
        <input type="submit" name="publish" value="Add To Drinks!" />
    </form>
</div>
</body>
</html>
