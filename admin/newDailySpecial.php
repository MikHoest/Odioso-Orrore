<?php
require_once("include/session.php");
require_once("include/connection.php");
require_once("include/functions.php");
include('adminSwitch.php');
include ('DS_uploader.php');
confirm_logged_in();

if(isset($_POST{'publish'})) {

    $dailySpecial = $_POST['dailySpecial'];
    $ingredients = $_POST['ingredients'];
    $price = $_POST['price'];
    //$review = $_POST['review'];
    //$picture = $_POST['picture']; , `picture`, '$picture'

    $query = "INSERT INTO dailyspecial (`dailySpecial`, `ingredients`, `price`) VALUES ('$dailySpecial', '$ingredients', '$price')";
    mysqli_query($connection, $query) or die('Error querying database.');
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>
<div class="wrapper" style="background-color: #237d35; background-image: none; opacity: 0.8;">
    <h4 align="center">Daily Special section</h4>
    <form action="newDailySpecial.php" method="post">
        <input type="text" style="background-color: #ffffff" name="dailySpecial" placeholder="Daily Special" size="30" align="center"><br/>
        <textarea class="nooResize" name="ingredients" style="background-color: #ffffff" cols="30" placeholder= "Ingredients" rows="5" align="right"></textarea><br/>
        <style>
            textarea.nooResize
            {
                resize: none;
            }
        </style>
        <input type="number" style="background-color: #ffffff" name="price" placeholder="Price" size="30" align="left"> DKK.-<br/>
        <b>Image: </b> <input type="file" name="image"> <br>
        <b>Width: </b> <input type="text" name="wSize"> <br>
        <b>Height: </b> <input type="text" name="hSize"> <br>
        <input type="submit" name="publish" value="Add To DailySpecials!" />
    </form>
</div>
</body>
</html>
