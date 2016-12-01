<?php
require_once("admin/include/session.php");
require_once("admin/include/connection.php");
require_once("admin/include/functions.php");
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<div class="fixed-bg">
<head>
    <meta charset="UTF-8">
    <title>Odioso Orrore</title>
    <link rel="stylesheet" type="text/css" href="bootstrap" />
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <style>
ul
        {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: rgba(177, 21, 21, 0);
            font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
            font-size: 0;
            text-align: center;
        }
        li
        {
            float: none;
            display: inline-block;
        }
        li a
        {
            display: inline-block;
            color: #fefffd;
            padding: 0;
        }
        li a:hover
        {

            background-color: rgba(255, 104, 107, 0);
            color: rgba(177, 21, 21, 0.8);
            font-style: normal;
            text-decoration: none;
        }
        .fixed-bg
        {
            background-image: url("picz/slide1.png");
            min-height: 500px;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: auto;
        }

    </style>
</head>
<body>

<div class="container">
    <ul class="navbar-fixed-top" id="myTopnav">
        <div class="col-sm-3">
            <div class="logo" style="float:left">
                <a href="front.php">
                    <img src="picz/Logo1.png" style="width: 160px;">
                </a>
            </div>
        </div>


        <div class="icon">
            <a href="javascript:void(0)" style="font-size:40px;" onclick="myFunction()">
                <p class="navicon" style="color: white;"> ☠ </p>
            </a>
        </div>

    <li><a href="Menu.php" style="float: none"><img src="picz/MENU-MENU.png"></a></li>
    <li><a href="theNews.php" style="float: none"><img src="picz/MENU-NEWS.png"></a></li>
    <li><a href="Reservation.php" style="float: none"><img src="picz/MENU-RESERVATIONS.png"></a></li>



    </ul>



</div class="SlideshowContainer">

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

<style>
    .mySlides {display:none}
    .w3-left, .w3-right, .w3-badge {cursor:pointer}
    .w3-badge {height:13px;width:13px;padding:0}
</style>
<!--
<div class="w3-content w3-display-container">
    <img class="mySlides" src="picz/slide1.png" style="width:100%">
    <img class="mySlides" src="picz/slide2.png" style="width:100%">
    <img class="mySlides" src="picz/slide1.png" style="width:100%">
    <div class="w3-center w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
        <div class="w3-left w3-padding-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
        <div class="w3-right w3-padding-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
    </div>
</div>
-->
<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function currentDiv(n) {
        showDivs(slideIndex = n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-white", "");
        }
        x[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " w3-white";
    }
</script>

<style type="text/css">
    @font-face {
        font-family: "Cardinal";
        src: url(fonts/Cardinal.ttf) format("truetype");
    }
    p.customfont {
        font-family: "Cardinal", Verdana, Tahoma, sans-serif;
    }
</style>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
   <div class="wrapper" style="height: inherit; margin-left: 25%;">
       <p class="customfont" style="font-size: 40px; padding: 20px; font-weight: bold; text-align: center; color: #000000">Celebrating the scariest of Italian cuisine since</p>
       <p class="customfont" style="font-size: 45px; padding: 20px; font-weight: bold; text-align: center; color: #000000">2016</p>
   </div>
<br>
   <div class="wrapper" style="margin-left: 25%;">

       <p class="customfont" style="font-size: 45px; padding: 20px; font-weight: bold; text-align: center;"><a href='theNews.php' style="color: #000000">Read the latest from Odioso Orrore!</a></p>

<?php
$query = "SELECT * FROM news ORDER BY ID DESC LIMIT 1 ";
mysqli_query($connection, $query) or die('Error querying database.');

$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($result)) {
    $title=$row['title'];
    $description=$row['description'];
    $date=$row['date'];
    echo "<div align='left' style='font-size: 14px; font-family: Verdana'>"."Date: ".$date. "</div><br>"."<div align='left' style='font-size: 28px; font-family: Verdana'>" .$title . "</div>"."<br>"."<div align='justify' style='font-size: 16px; font-family: Verdana'>".$description."</div>";
}
?>
   </div>

<br>
   <div class="wrapper" style="margin-left: 25%";>

       <p class="customfont" style="font-size: 45px; padding: 20px; font-weight: bold; text-align: center;"><a href='Menu.php' style="color: #000000" >The Daily Special!</a></p>
       <?php

       $query = "SELECT * FROM dailyspecial ORDER BY rand(" . date("Ymd") . ") LIMIT 1";
       mysqli_query($connection, $query) or die('Error querying database.');

       $result = mysqli_query($connection, $query);

       while ($row = mysqli_fetch_array($result)) {
           $dailySpecial=$row['dailySpecial'];
           $ingredients=$row['ingredients'];
           $price=$row['price'];
           echo "<div align='left' style='font-size: 28px; font-family: Verdana'>" . $dailySpecial. "</div><br>"."<div align='justify' style='font-size: 16px; font-family: Verdana'>" .$ingredients . "</div>"."<br>"."<div align='left' style='font-size: 16px; font-family: Verdana'>"."Price: ".$price.".- DKK" ."</div>";
       }

       ?>

   </div>
<br>
<div class="wrapper" style="margin-left: 25%";>

    <p class="customfont" style="font-size: 45px; padding: 20px; font-weight: bold; text-align: center;"><a href='Menu.php' style="color: #000000" >The Special Drink!</a></p>
    <?php
    $query = "SELECT * FROM drinks LIMIT 1";
    mysqli_query($connection, $query) or die('Error querying database.');

    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($result)) {
        $drink=$row['drink'];
        $ingredients=$row['ingredients'];
        $price=$row['price'];
        echo "<div align='left' style='font-size: 28px; font-family: Verdana'>" . $drink. "</div><br>"."<div align='justify' style='font-size: 16px; font-family: Verdana'>" .$ingredients . "</div>"."<br>"."<div align='left' style='font-size: 16px; font-family: Verdana'>"."Price: ".$price.".- DKK" ."</div>";
    }

    ?>

</div>
<br>
   <div class="wrapper" style="margin-left: 25%";>
       <strong class="choice"><h2>Contact</h2></strong>

       <form action="process.php" method="post">
       <input type="text" style="background-color: #ffffff" name="name" placeholder="Name" size="30" align="center"><br/>
       <input type="text" style="background-color: #ffffff" name="email" placeholder="Email" size="30" align="center"><br/>
       <textarea class="nooResize" name="message" style="background-color: #ffffff" cols="32" placeholder= "Message" rows="5" align="center"></textarea><br/>
       <style>
textarea.nooResize
           {
               resize: none;
           }
       </style>
       <input type="submit" style="background-color: #a21b0c" name="submit" value="SEND!" />
   </form>
   </div>
</body>

<footer><p style="margin: 20px; float: left;">© 2016 | Odioso Orrore</p><li><a href="admin/login.php" style="float: none"><img src="picz/eyeBall.png" width="50" height="50"></a></li></footer>
</div>
</html>