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
        li a:hover {

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
            background-image: url("twitter.png");
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
            background-image: url("facebook.png");
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
            background-image: url("instagram.png");
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
        <li id="menu"><a href="Menu.php" style="float: none"><img src="picz/MENU-MENU%20-%20Kopi.png" onmouseover="this.src='picz/MENU-MENU-HOVER'" onmouseout="this.src='picz/MENU-MENU%20-%20Kopi.png'"></a></li>
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
<html lang="en">
<div class="fixed-bg">

<body>
<div id="menu">
    <ul>
        <li>News</li>
    </ul>
</div>

<div class="wrapper" style="margin-left: 25%; height: inherit">
    <p class="customfont" style="font-size: 45px; padding: 20px; font-weight: bold; text-align: center; color: #000000;">Odioso Orrore<p/>
    <p class="customfont" style="font-size: 50px; padding: 20px; font-weight: bold; text-align: center; color: #000000;">NEWS<p/>
</div>
<br>
<div style="margin-left: 25%; height: inherit; font-size: 16px;">
<?php

$query = "SELECT * FROM news ORDER BY ID DESC";
mysqli_query($connection, $query) or die('Error querying database.');

$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($result))
{
    $title=$row['title'];
    $description=$row['description'];
    $date=$row['date'];
    echo "<div class='wrapper' align='left'><p class=\"customfont\" style=\"font-size: 20px; padding: 20px; font-weight: bold; text-align: left;\">" . "Date: ". $date. "<br>"."<div align='center'><p class=\"customfont\" style=\"font-size: 35px; padding: 20px; font-weight: bold; text-align: center; color: #000000;\">" . $title. "</div><br>"."<div align='justify' style='font-size: 16px; font-family: Verdana'>" .$description . "</div></div><br><br>";
}
?>
</div>
<footer><p class="customfont" style="font-size: 20px; position: relative; text-align: center;">☠ Opening Hours: Monday - Thurday: 10-22 Friday - Saturday: 12-00 Sundays: 12-22<br><br><a href="admin/login.php" style="color: white">© 2016 - Odioso Orrore - ☠</a></p></footer>
</body>
</html>
</body>
</html>