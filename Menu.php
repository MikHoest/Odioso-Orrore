<?php
require_once("admin/include/session.php");
require_once("admin/include/connection.php");
require_once("admin/include/functions.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link rel="stylesheet" type="text/css" href="bootstrap" />
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
    <style type="text/css">
        @font-face {
            font-family: "Cardinal";
            src: url(fonts/Cardinal.ttf) format("truetype");
        }
        p.customfont {
            font-family: "Cardinal", Verdana, Tahoma, sans-serif;
        }
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
            min-height: 500px;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: auto;
        }
        .social
        {
            position: inherit;
            width: 100%;
            top: 50%;
            text-align: center;
            transform: translateY(-50%);
        }

        .social .link
        {
            display: inline-block;
            vertical-align: middle;
            position: relative;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-clip: content-box;
            padding: 2px;
            transition: .5s;
            color: #D7D0BE;
            margin-left: 15px;
            margin-right: 15px;
            text-shadow:
                0 -1px 0 rgba(0, 0, 0, 0.2),
                0 1px 0 rgba(255, 255, 255, 0.2);
            font-size: 15px;
        }

        .social .link span
        {
            display: block;
            position: absolute;
            text-align: center;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .social .link:hover
        {
            padding: 15px;
            color: #000000;
            margin-left: -5px;
            transform: translateX(10px) rotate(360deg);
        }

        .social .link.google-plus
        {
            background-color: tomato;
            color: white;
        }

        .social .link.twitter
        {
            border: 1px solid #00ACEE;
            background-color: #00ACEE;
            background-image: url("socialIcons/twitter.png");
            background-repeat: no-repeat;
            background-position: center;
            background-size: 75%;
            background-blend-mode: overlay;
            color: #000000;
        }

        .social .link.twitter:hover
        {
            background-size: 50%;
        }

        .social .link.facebook
        {
            border: 1px solid #3B5998;
            background-color: #223b80;
            background-image: url("socialIcons/facebook.png");
            background-repeat: no-repeat;
            background-position: center;
            background-size: 75%;
            background-blend-mode: overlay;
            color: #000000;
        }

        .social .link.facebook:hover
        {
            background-size: 50%;
        }

        .social .link.instagram
        {

            border: 1px solid purple;
            background-color: purple;
            background-image: url("socialIcons/instagram.png");
            background-repeat: no-repeat;
            background-position: center;
            background-size: 75%;
            background-blend-mode: overlay;
            color: #000000;
        }

        .social .link.instagram:hover
        {
            background-size: 50%;
        }

        .cb-slideshow,
        .cb-slideshow:after {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0;
        }
        .cb-slideshow:after {
            content: '';
            background: url("picz/Scanlines.png") repeat top left;

        }

        .cb-slideshow li span {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            color: transparent;
            background-size: cover;
            background-position: 70% 50%;
            background-repeat: no-repeat;
            opacity: 0;
            z-index: 0;
            animation: imageAnimation 18s linear infinite 0s;
        }

        .cb-slideshow li div {
            z-index: 1000;
            float: left;
            left: 0;
            width: 100%;
            text-align: left;
            padding-left: 15%;
            opacity: 0;
            color: #fff;
            animation: titleAnimation 18s linear infinite 0s;
        }


        .cb-slideshow li div h3 {
            font-family: Cardinal, sans-serif;
            font-size: 100px;
            padding: 0;
            line-height: 700px;
        }

        .cb-slideshow li:nth-child(1) span {
            background-image: url("picz/slide01.jpg");
        }

        .cb-slideshow li:nth-child(2) span {
            background-image: url("picz/slide2.jpg");
            animation-delay: 6s;
        }

        .cb-slideshow li:nth-child(3) span {
            background-image: url("picz/slide3.jpg");
            animation-delay: 12s;
        }

        .cb-slideshow li:nth-child(1) div {
        }

        .cb-slideshow li:nth-child(2) div {
            animation-delay: 6s;
        }
        .cb-slideshow li:nth-child(3) div {
            animation-delay: 12s;
        }

        @keyframes imageAnimation {
            0% { opacity: 0; animation-timing-function: ease-in; }
            23% { opacity: 1; animation-timing-function: ease-out; }
            29% { opacity: 1 }
            35% { opacity: 0 }
            100% { opacity: 0 }
        }

        @keyframes titleAnimation {
            0% { opacity: 0; animation-timing-function: ease-in; }
            23% { opacity: 1; animation-timing-function: ease-out; }
            29% { opacity: 1 }
            35% { opacity: 0 }
            100% { opacity: 0 }
        }

        @media screen and (max-width: 1140px) {
            .cb-slideshow li div h3 { font-size: 140px }
        }
        @media screen and (max-width: 600px) {
            .cb-slideshow li div h3 { font-size: 80px }
        }

        h3 {
            position: relative;
            padding-top: 300px;
            padding-left:120px;
            font-size: 90px;

        }

        h2 {
            position: relative;
            text-align: center;
        }

        @media screen and (max-width: 600px) {
            h3 {
                font-size: 40px;

            }
        }
</style>
</head>
<body>
<!-- buttons on top - links -->
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

        <li id="home"><a href="front.php" style="float: none"><img src="picz/MENU-HOME%20-%20Kopi.png" onmouseover="this.src='picz/MENU-HOME-HOVER'" onmouseout="this.src='picz/MENU-HOME%20-%20Kopi.png'"></a>
        <li id="menu"><a href="theNews.php" style="float: none"><img src="picz/MENU-NEWS%20-%20Kopi.png" onmouseover="this.src='picz/MENU-NEWS-HOVER'" onmouseout="this.src='picz/MENU-NEWS%20-%20Kopi.png'"></a></li>
        <li id="reservations"><a href="Reservation.php" style="float: none"><img src="picz/MENU-RESERVATIONS%20-%20Kopi.png" onmouseover="this.src='picz/MENU-RESERVATIONS-HOVER'" onmouseout="this.src='picz/MENU-RESERVATIONS%20-%20Kopi.png'"></a></li>

    </ul>
</div>
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
<script src="slidescript.js"></script>
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
<style type="text/css">
    @font-face {
        font-family: "Cardinal";
        src: url(fonts/Cardinal.ttf) format("truetype");
    }
    p.customfont {
        font-family: "Cardinal", Verdana, Tahoma, sans-serif;
    }
</style>
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
<br><br><br>
<div class="wrapper" style="height: inherit; background-color: white; border-radius: 1px; opacity: 0.5; max-width: 82.5%;">
    <p class="customfont" style="font-size: 40px; padding: 20px; font-weight: bold; text-align: right; color: #000000;">Odioso Orrore<p/>
    <p class="customfont" style="font-size: 55px; padding: 20px; font-weight: bold; text-align: right; color: #000000;">MENU<p/>
</div>
<br>
<!-- Daily Special -->
<div class="foodwrapper left" style="width: 35%; margin-left: 13%; border-radius: 2px;"><p class="customfont" style="color: black; font-size: 45px; padding: 20px; font-weight: bold; text-align: center;">Daily Specials</a></p> <!-- fix this-->
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
    echo "<div class='wrapper' style='width: 87%; border-radius: 2px;'>".$picture."<table><p class=\"customfont\" style=\"font-size: 28px; padding: 20px; font-weight: bold; text-align: left;\">".$dailySpecial."</div></p><br><br>"."<div align='justify' style='font-size: 16px; font-family: Verdana'>" .$ingredients . "</div><p class=\"customfont\" align='center' style=\"font-size: 25px; text-align: left;\"><br><br>" . "Price: " .$price . ".- DKK<hr></p></table></div>";
}
?>
</div>
<!-- Main Menu -->
<div class="foodwrapper right" style="width: 35%; margin-right: 13%; border-radius: 2px;"><p class="customfont" style="color: black; font-size: 45px; padding: 20px; font-weight: bold; text-align: center;">Main Menu</a></p> <!-- fix this-->
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
    echo "<div class='wrapper' style='width: 87%; border-radius: 2px;'>".$picture."<table><p class=\"customfont\" style=\"font-size: 28px; padding: 20px; font-weight: bold; text-align: left;\">".$mainCourse."</div></p><br>"."<div align='justify' style='font-size: 16px; font-family: Verdana'>" .$ingredients . "</div><p class=\"customfont\" align='center' style=\"font-size: 25px; text-align: left;\"><br><br>" . "Price: " .$price . ".- DKK<hr></p></table></div>";
}
?>
</div>
<!-- Drinks -->
<div class="foodwrapper left" style="width: 35%; margin-left: 13%; border-radius: 2px;"><p class="customfont" style="color: black; font-size: 45px; padding: 20px; font-weight: bold; text-align: center;">Drinks</a></p> <!-- fix this-->
    <?php
    $query = "SELECT * FROM drink";
    mysqli_query($connection, $query) or die('Error querying database.');

    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($result))
    {
        $drink=$row['drink'];
        $ingredients=$row['ingredients'];
        $price=$row['price'];
        $picture=$row['picture'];
        //$review=$row['review'];
        echo "<div class='wrapper' style='width: 87%; border-radius: 2px;'>".$picture."<table><p class=\"customfont\" style=\"font-size: 28px; padding: 20px; font-weight: bold; text-align: left;\">".$drink."</div></p><br>"."<div align='justify' style='font-size: 16px; font-family: Verdana'>" .$ingredients . "</div><p class=\"customfont\" align='center' style=\"font-size: 25px; text-align: left;\"><br><br>" . "Price: " .$price . ".- DKK<hr></p></table></div>";
    }
    ?>
</div>
<br>
<footer><p class="customfont" style="font-size: 20px; position: relative; text-align: center;">☠ Opening Hours: Monday - Thurday: 10-22 Friday - Saturday: 12-00 Sundays: 12-22<br><br><a href="admin/login.php" style="color: white">© 2016 - Odioso Orrore - ☠</a></p></footer>
</body>
</html>
