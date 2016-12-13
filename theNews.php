<?php
require_once("admin/include/session.php");
require_once("admin/include/connection.php");
require_once("admin/include/functions.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News</title>
    <link rel="stylesheet" type="text/css" href="bootstrap" />
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
    <style>

    </style>
    <style type="text/css">
        @font-face {
            font-family: "Cardinal";
            src: url(fonts/Cardinal.ttf) format("truetype");
        }
        p.customfont {
            font-family: "Cardinal", Verdana, Tahoma, sans-serif;
        }
    </style>
</head>
<body>

<ul class="navbar-fixed-top" id="myTopnav">
    <div class="icon">
        <a href="javascript:void(0)" style="font-size:40px;" onclick="myFunction()">
            <p class="navicon" style="color: white;"> ☠ </p>
        </a>
    </div>

    <li id="home"><a href="front.php" style="float: none"><img src="picz/MENU-HOME%20-%20Kopi.png" onmouseover="this.src='picz/MENU-HOME-HOVER'" onmouseout="this.src='picz/MENU-HOME%20-%20Kopi.png'"></a>
    <li id="menu"><a href="Menu.php" style="float: none"><img src="picz/MENU-MENU%20-%20Kopi.png" onmouseover="this.src='picz/MENU-MENU-HOVER'" onmouseout="this.src='picz/MENU-MENU%20-%20Kopi.png'"></a></li>
    <li id="reservations"><a href="Reservation.php" style="float: none"><img src="picz/MENU-RESERVATIONS%20-%20Kopi.png" onmouseover="this.src='picz/MENU-RESERVATIONS-HOVER'" onmouseout="this.src='picz/MENU-RESERVATIONS%20-%20Kopi.png'"></a></li>

</ul>

<!-- SLIDESHOW -->
<ul class="cb-slideshow">
    <li>
        <span>1</span>

    </li>

    <li>
        <span>2</span>

    </li>

    <li>
        <span>3</span>

    </li>
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

<div id="menu">
    <ul>
        <li>News</li>
    </ul>
</div>

<!-- Logo -->
<div class="logo">
    <a href="front.php">
        <img src="picz/Logo2.png" style="width: 160px;">
    </a>
</div>

<br>
<div style="background-color: white; border-radius: 3px; opacity: 0.5; width: 75%; margin-left: 15%;">
    <p class="customfont" style="padding-top: 20px; font-weight: bold; text-align: center; color: #000000;">Odioso Orrore</p>
    <p class="customfont" style="padding-bottom: 20px; font-weight: bold; text-align: center; color: #000000;">NEWS</p>
</div>
<br>
<!-- NEWS -->
<div style=" height: inherit;">
<?php

$query = "SELECT * FROM news ORDER BY ID DESC";
mysqli_query($connection, $query) or die('Error querying database.');

$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($result))
{
    $title=$row['title'];
    $description=$row['description'];
    $date=$row['date'];
    echo "<div class='wrapper' align='left' style='border-radius: 3px;'><p class=\"customfont\" style=\"font-size: 20px; padding: 10px; text-align: left;\">" . "Date: ". $date. "<br>"."<div align='center'><p class=\"customfont\" style=\" padding-top: 20px; font-weight: bold; text-align: center; color: #000000;\">" . $title. "</div><br>"."<div align='justify' style=' font-family: Verdana'>" .$description . "</div></div><br>";
}
?>
</div>
<br><br>
<div class="footer">☠ Opening Hours: Monday - Thursday: 10-22 Friday - Saturday: 12-00 Sundays: 12-22<br><br><a href="admin/login.php" style="color: white">© 2016 - Odioso Orrore - ☠</a></p></div>
</body>
</html>