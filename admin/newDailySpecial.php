<?php
require_once("include/session.php");
require_once("include/connection.php");
require_once("include/functions.php");
include('adminSwitch.php');
confirm_logged_in();

if(isset($_POST{'publish'})) {

    $dailyspecial = $row['dailySpecial'];
    $ingredients = $row['ingredients'];
    $price = $row['price'];
    //$review = $row['review'];
    $picture = $_POST['picture'];

    $query = "INSERT INTO `dailyspecial`(`ID`, `dailySpecial`, `ingredients`, `price`, `picture`) VALUES ($dailyspecial, $ingredients,$price, $picture)";
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
        <form action="../upload/upload_file.php" method="post" enctype="multipart/form-data">
            <label for="file">PICTURE --><input type="file" name="picture"></label>
            <!--      <input type="submit" name="submit" value="Upload"> -->
        </form>
        <input type="submit" name="publish" value="Add To DailySpecials!" />
    </form>
</div>
</body>
</html>
