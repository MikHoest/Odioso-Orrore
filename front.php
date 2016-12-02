<?php
require_once("admin/include/session.php");
require_once("admin/include/connection.php");
require_once("admin/include/functions.php");
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<div class="fixed-bg">
<head>
    <meta charset="UTF-8 utf-8">
    <title>Odioso Orrore</title>
    <link href="cssCap/style.css">
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
            padding: 20px;
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
            background-size: 25%;
            background-blend-mode: overlay;
            color: #000000;
        }

        .social .link.facebook
        {

            border: 1px solid #3B5998;
            background-color: #3B5998;
            background-image: url("facebook.png");
            background-size: 25%;
            background-blend-mode: overlay;
            color: #000000;
        }
        .social .link.instagram
        {

            border: 1px solid purple;
            background-color: purple;
            background-image: url("instagram.png");
            background-size: 25%;
            background-blend-mode: overlay;
            color: #000000;
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

        <li><a href="Menu.php" style="float: none"><img src="picz/MENU-MENU%20-%20Kopi.png"></a></li>
        <li><a href="theNews.php" style="float: none"><img src="picz/MENU-NEWS%20-%20Kopi.png"></a></li>
        <li><a href="Reservation.php" style="float: none"><img src="picz/MENU-RESERVATIONS%20-%20Kopi.png"></a></li>

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
<!--
<style>
    .mySlides {display:none}
    .w3-left, .w3-right, .w3-badge {cursor:pointer}
    .w3-badge {height:13px;width:13px;padding:0}
</style>

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
    textarea.nooResize
    {
        resize: none;
    }
</style>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="wrapper" style="height: inherit; margin-left: 25%;">
       <p class="customfont" style="font-size: 40px; padding: 20px; font-weight: bold; text-align: center; color: #000000">Celebrating the scariest of Italian cuisine since</p>
       <p class="customfont" style="font-size: 45px; padding: 20px; font-weight: bold; text-align: center; color: #000000">2016</p>
</div>
<br>
<!-- NEWS-->
<div class="wrapper" style="margin-left: 25%;">
       <p class="customfont" style="font-size: 45px; padding: 20px; font-weight: bold; text-align: center;"><a href='theNews.php' style="color: #000000">Read the latest from Odioso Orrore</a></p>
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
<!--Daily Special-->
<div class="wrapper" style="margin-left: 25%";>
       <p class="customfont" style="font-size: 45px; padding: 20px; font-weight: bold; text-align: center;"><a href='Menu.php' style="color: #000000" >The Daily Special</a></p>
       <?php

       $query = "SELECT * FROM dailyspecial ORDER BY rand(" . date("Ymd") . ") LIMIT 1"; //need to fix this for new special every day!!
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
<!-- DRINKS-->
<div class="wrapper" style="margin-left: 25%";>
    <p class="customfont" style="font-size: 45px; padding: 20px; font-weight: bold; text-align: center;"><a href='Menu.php' style="color: #000000" >The Special Drink</a></p>
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
    <head>
        <script type='text/javascript'>
            function refreshCaptcha()
            {
                var img = document.images['captchaimg'];
                img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
            }
            (function(d, s, id)
        </script>
    </head>
<!-- <div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
</div>-->
<br><br><br><br><br><br><br>
<!-- SocialMedia-->
<div class="wrapper social" style="margin-left: 25%; height: inherit;">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <p class="customfont" style="font-size: 45px; padding: 20px; font-weight: bold; text-align: center; color: black;">Our Social Media</p>
    <a href="https://www.instagram.com/odiosoorrore/"  class="link instagram" target="_parent blank"><span class="fa fa-instagram"></span></a>
    <a href="https://www.facebook.com/OdiosoOrrore"  class="link facebook" target="_parent blank"><span class="fa fa-facebook-square"></span></a>
    <a href="https://twitter.com/OdiosoOrrore"  class="link twitter" target="_parent blank"><span class="fa fa-twitter"></span></a>
</div>
<!-- CONTACT -->
<div class="wrapper" style="margin-left: 25%; height: inherit;">
        <?php
        if(isset($_POST['Submit'])){
            // code for check server side validation
            if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){
                $msg="<span style='color:red'>The Validation code does not match!</span>";// Captcha verification is incorrect.
            }else{// Captcha verification is Correct. Final Code Execute here!
                $msg="<span style='color:green'>The Validation code has been matched.</span>";
            }
        }
        ?>
    <p class="customfont" style="font-size: 45px; padding: 20px; font-weight: bold;color: black; text-align: center;">Contact us</p>
        <form action="process.php" method="post" style="content: inherit">
            <input type="text" style="background-color: #ffffff" name="name" placeholder="Name" size="30" align="center"><br/>
            <input type="text" style="background-color: #ffffff" name="email" placeholder="Email" size="30" align="center"><br/>
            <textarea class="nooResize" name="message" style="background-color: #ffffff" cols="32" placeholder= "Message" rows="5" align="center"></textarea><br/>
            <!-- <input type="submit" style="background-color: #a21b0c" name="submit" value="SEND!" /> -->
            <table>
                <?php if(isset($msg)){?>
                    <tr>
                        <td colspan="2" align="left" valign="top"><?php echo $msg;?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td align="center" valign="top"> Validation code:</td>
                    <img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg'><br><br>
                    <input id="captcha_code" name="captcha_code" type="text" placeholder="Enter the code above here :">
                    <br>
                    Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh.
                </tr>
                <td><input name="Submit" type="submit" onclick="return validate();" value="Send"></td>
            </table>
        </form>
</div>
<br>
<footer><p class="customfont" style="font-size: 20px; padding: 20px; font-weight: bold; text-align: center;"><a href="admin/login.php" style="color: white">© 2016 - Odioso Orrore</p></a></footer>
</html>