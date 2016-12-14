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
    //$review = $_POST['review'];
    //$picture = $_POST['picture']; `picture` , $picture

    $query = "INSERT INTO menuitems(`mainCourse`, `ingredients`, `price`, ) VALUES ('$mainCourse', '$ingredients', '$price')";
    var_dump($query);
    mysqli_query($connection, $query) or die('Error querying database.');
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
    <style>
        textarea.nooResize
        {
            resize: none;
        }
    </style>
</head>
<body>
<div class="wrapper" style="background-color: #237d35; background-image: none; opacity: 0.8;">
    <h4 align="center">Main Course section</h4>
    <form action="newMenu.php" method="post">
        <input type="text" style="background-color: #ffffff" name="mainCourse" placeholder="Main Course" size="30" align="center"><br/>
        <textarea class="nooResize" name="ingredients" style="background-color: #ffffff" cols="30" placeholder= "Ingredients" rows="5" align="right"></textarea><br/>
        <input type="number" style="background-color: #ffffff" name="price" placeholder="Price" size="30" align="left"> DKK.-<br/>
        <input type="submit" name="publish" value="Add To Menu!" />
    </form>
    <!-- <form action="upload_file.php" method="post" enctype="multipart/form-data">
         <label for="file">PICTURE -><input type="file" name="picture"></label>
     </form>-->
</div>
<!-- <div class="wrapper" style="background-color: #237d35; background-image: none; opacity: 0.8;">
    <h4 align="center">Main Course section</h4>
    <form action="newMenu.php" method="post">
        <input type="text" style="background-color: #ffffff" name="maincourse" placeholder="Main Course" size="30" align="center"><br/>
        <textarea class="nooResize" name="ingredients" style="background-color: #ffffff" cols="30" placeholder= "Ingredients" rows="5" align="right"></textarea><br/>
        <input type="number" style="background-color: #ffffff" name="price" placeholder="Price" size="30" align="left"> DKK.-<br/>
    </form>
    <form action="upload_file.php" method="post" enctype="multipart/form-data">
        <label for="file">PICTURE -><input type="file" name="picture"></label>
    </form>
    <input type="submit" name="publish" value="Add To Menu!" />
</div> -->
</body>
</html>
