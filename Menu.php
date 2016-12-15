<?php
require_once("admin/include/session.php");
require_once("admin/include/connection.php");
require_once("admin/include/functions.php");
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8 utf-8">
    <title>Menu</title>
    <link href="cssCap/style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap" />
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" href="picz/Logo2.png">

</head>
<body>
<!-- buttons on top - links -->
<div class="container">
    <ul class="navbar-fixed-top" id="myTopnav">
        <div class="icon">
            <a href="javascript:void(0)" style="font-size:40px;" onclick="myFunction()">
                <p class="navicon" style="color: white;"> ☠ </p>
            </a>
        </div>
        <li id="home"><a href="front.php" style="float: none"><img src="picz/MENU-HOME%20-%20Kopi.png" onmouseover="this.src='picz/MENU-HOME-HOVER'" onmouseout="this.src='picz/MENU-HOME%20-%20Kopi.png'"></a>
        <li id="menu"><a href="theNews.php" style="float: none"><img src="picz/MENU-NEWS%20-%20Kopi.png" onmouseover="this.src='picz/MENU-NEWS-HOVER'" onmouseout="this.src='picz/MENU-NEWS%20-%20Kopi.png'"></a></li>
        <li id="reservations"><a href="Reservation.php" style="float: none"><img src="picz/MENU-RESERVATIONS%20-%20Kopi.png" onmouseover="this.src='picz/MENU-RESERVATIONS-HOVER'" onmouseout="this.src='picz/MENU-RESERVATIONS%20-%20Kopi.png'"></a></li>

    </ul>
</div>
<!-- SLIDESHOW -->
<ul class="cb-slideshow">
    <li><span>1</span></li>
    <li><span>2</span></li>
    <li><span>3</span></li>
</ul>
<!-- SLIDESHOW END -->
<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "navbar-fixed-top") {
            x.className += " responsive";
        } else {
            x.className = "navbar-fixed-top";
        }
    }
</script>
<!-- Logo -->
<div class="logo">
    <a href="front.php">
        <img src="picz/Logo2.png" style="width: 160px;">
    </a>
</div>
<br><br><br>
<div style="height: inherit; background-color: white; border-radius: 3px; opacity: 0.5; max-width: 75%; margin-left: 15%;">
    <p class="customfont" style="font-weight: bold; text-align: center; color: black;">Odioso Orrore</p>
    <p class="customfont" style="font-weight: bold; text-align: center; color: black;">MENU</p>
</div>
<br>
<!-- Daily Special -->
<div class="foodwrapper" style="border-radius: 2px;"><p class="customfont">Daily Specials</a></p> <!-- fix this-->
<?php
$query = "SELECT * FROM dailyspecial";
mysqli_query($connection, $query) or die('Error querying database.');

$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($result))
{
    $dailySpecial=$row['dailySpecial'];
    $ingredients=$row['ingredients'];
    $price=$row['price'];
    $picture=$row['picture'];
    //$review=$row['review'];
    echo "<div class='foodContent'><table><p class='customfont'>".$dailySpecial."</p></div><br><br>"."<div align='justify' style='font-size: 18px; font-family: Verdana'>" .$ingredients . "</div><p class='customfont' align='center' style='font-size: 25px; text-align: left;'><br><br><br><ins>"."Price: ".$price .".- DKK</ins></p><img src='$picture' alt='$dailySpecial, $ingredients' style='height: 200px; width: 200px;'></table></div>";
}
?>
</div>
<!-- Main Menu -->
<div class="foodwrapper" style="border-radius: 2px;"><p class="customfont">Main Menu</a></p> <!-- fix this-->
<?php
$query = "SELECT * FROM menuitems";
mysqli_query($connection, $query) or die('Error querying database.');

$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($result))
{
    $mainCourse=$row['mainCourse'];
    $ingredients=$row['ingredients'];
    $price=$row['price'];
    $picture=$row['picture'];
    //$review=$row['review'];
    echo "<div class='foodContent' style='border-radius: 2px;'><table><p class='customfont'>".$mainCourse."</p></div><br><br>"."<div align='justify' style='font-size: 18 px; font-family: Verdana'>" .$ingredients . "</div><p class='customfont' align='center' style=\"font-size: 25px; text-align: left; \"><br><br><br><ins>"."Price: ".$price .".- DKK</ins></p><img src='$picture' alt='$mainCourse, $ingredients'  style='height: 200px; width: 200px;'></table></div>";
}
?>
</div>
<!-- Drinks -->
<div class="foodwrapper" style="border-radius: 2px;"><p class="customfont">Drinks</a></p> <!-- fix this-->
    <?php
    $query = "SELECT * FROM drinks";
    mysqli_query($connection, $query) or die('Error querying database.');

    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($result))
    {
        $drink=$row['drink'];
        $ingredients=$row['ingredients'];
        $price=$row['price'];
        $picture=$row['picture'];
        //$review=$row['review'];
    }
    ?>
</div>
<br><br><br>
<div class="container"></div>
<footer>
    <div class="footer"><p class="customfont" style="font-size: 20px; color: white; font-weight: normal;">☠ Opening Hours: Monday - Thursday: 10-22 Friday - Saturday: 12-00 Sundays: 12-22<br><br><a href="admin/login.php" style="color: white">© 2016 - Odioso Orrore - ☠</a></p></div>
</footer>
</body>
</html>
