<?php
require_once("admin/include/session.php");
require_once("admin/include/connection.php");
require_once("admin/include/functions.php");
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8 utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Odioso Orrore</title>
    <link href="cssCap/style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap" />
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <style type="text/css">
        /* Popup container - can be anything you want */
        .popup {
            position: static;
            display: inline-block;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        /* The actual popup */
        .popup .popuptext {
            visibility: hidden;
            width: inherit;
            height: inherit;
            background-color: rgb(37, 122, 39);
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 8px 0;
            position: absolute;
            z-index: 1;
            bottom: 100%;
            left: 10%;
            margin-left: -80px;
        }
        /* Popup arrow */
        .popup .popuptext::after {
            content: "";
            position: inherit;
            top: -150%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: rgba(162, 27, 12, 0) transparent transparent transparent;
        }
        /* Toggle this class - hide and show the popup */
        .popup .show {
            visibility: visible;
            -webkit-animation: fadeIn 2s;
            animation: fadeIn 2s;
        }
        /* Add animation (fade in the popup) */
        @-webkit-keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }
        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity:1 ;}
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
            text-align: right;
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
            color: rgba(134, 177, 139, 0.8);
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

            color: #000000;
            margin-left: -5px;
            transform: translateX(10px) rotate(360deg);
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
            border: 1px solid #223b80;
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
            background-image: url("picz/CRTscanlines.png");
            width: 100%;
            height: 100%;
            background-repeat:no-repeat;
        }
        .cb-slideshow li span {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            color: transparent;
            background-size: cover;
            background-position: 40% 50%;
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
        input[type=submit] {
            font-family: "Cardinal", Verdana, Tahoma, sans-serif;
            font-size: 24px;
            width: 100%;
            background-color: #000000;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
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
</head>
<!-- buttons on top - links -->
<div class="container">
    <ul class="navbar-fixed-top" id="myTopnav">
        <div class="col-sm-3">
            <div class="logo" style="float:left">
                <a href="front.php">
                    <img src="picz/Logo2.png" style="width: 160px;">
                </a>
            </div>
        </div>


        <div class="icon">
            <a href="javascript:void(0)" style="font-size:40px;" onclick="myFunction()">
                <p class="navicon" style="color: white;"> ☠ </p>
            </a>
        </div>

        <li id="menu"><a href="Menu.php" style="float: none"><img src="picz/MENU-MENU%20-%20Kopi.png" onmouseover="this.src='picz/MENU-MENU-HOVER'" onmouseout="this.src='picz/MENU-MENU%20-%20Kopi.png'"></a></li>
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
<h3><p class="customfont" style="font-size: 90px;">Welcome to Odioso Orrore</p></h3>
<br>
<div style="background-color: white; border-radius: 3px; opacity: 0.5;">
       <p class="customfont" style=" font-weight: bold; text-align: center; padding-top: 20px; color: #000000">Celebrating the scariest of Italian cuisine since</p>
       <p class="customfont" style=" font-weight: bold; text-align: center; padding-bottom: 20px; color: #000000">2016</p>
</div>
<br><br><br><br><br>
<!-- NEWS-->
<div class="wrapper" style="height: inherit">
       <p class="customfont" style="padding: 20px; font-weight: bold; text-align: center;"><a href='theNews.php' style="color: #000000">Read the latest news from Odioso Orrore</a></p>
<?php
$query = "SELECT * FROM news ORDER BY ID DESC LIMIT 1 ";
mysqli_query($connection, $query) or die('Error querying database.');

$result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($result)) {
        $title=$row['title'];
        $description=$row['description'];
        $date=$row['date'];
        echo "<div align='left'><p class=\"customfont\" style=\"font-size: 20px; padding: 10px; text-align: left;\">"."Date: ".$date. "</div><br>"."<div align='left' style='font-size: 28px; font-family: Verdana'>" .$title . "</div>"."<br>"."<div align='justify' style=' font-family: Verdana'>".$description."</div>";
    }
?>
</div>
<br>
<!--Daily Special-->
<div class="wrapper" style="height: inherit";>
       <p class="customfont" style="padding: 20px; font-weight: bold; text-align: center;"><a href='Menu.php' style="color: #000000" >The Daily Special</a></p>
       <?php

       $query = "SELECT * FROM dailyspecial ORDER BY rand(" . date("Ymd") . ") LIMIT 1"; //need to fix this for new special every day!!
       mysqli_query($connection, $query) or die('Error querying database.');

       $result = mysqli_query($connection, $query);

       while ($row = mysqli_fetch_array($result)) {
           $dailySpecial=$row['dailySpecial'];
           $ingredients=$row['ingredients'];
           $price=$row['price'];
           echo "<div align='left' style='font-size: 28px; font-family: Verdana'>" . $dailySpecial. "</div><br>"."<div align='justify' style='font-family: Verdana'>" .$ingredients . "</div>"."<br>"."<p class=\"customfont\" align='center' style=\"font-size: 25px; text-align: left;\"><br><br>" . "Price: " .$price . ".- DKK</p></div>";
       }
       ?>
</div>
<br>
<!-- DRINKS-->
<div class="wrapper" style="height: inherit";>
    <p class="customfont" style="padding: 20px; font-weight: bold; text-align: center;"><a href='Menu.php' style="color: #000000" >The Special Drink</a></p>
    <?php
    $query = "SELECT * FROM drinks LIMIT 1";
    mysqli_query($connection, $query) or die('Error querying database.');

    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($result)) {
        $drink=$row['drink'];
        $ingredients=$row['ingredients'];
        $price=$row['price'];
        echo "<div align='left' style='font-size: 28px; font-family: Verdana'>" . $drink. "</div><br>"."<div align='justify' style='font-family: Verdana'>" .$ingredients . "</div>"."<br>"."<p class=\"customfont\" align='center' style=\"font-size: 25px; text-align: left;\"><br><br>" . "Price: " .$price . ".- DKK</p></div>";
    }
    ?>
</div>
<!-- <div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
</div>-->
<br>
<!-- RESERVE TABLE -->
<div class="wrapper" style="height: inherit;">
    <br><br>
    <p class="customfont" style="font-weight: bold; text-align: center; color: black;"><a href="Reservation.php" class="popup">Reserve a Table</a></p>
    <p class="customfont" style="font-weight: bold; text-align: center; color: black;"><a href="Reservation.php" class="popup">HERE</a></p>
    <?php

    ?>
</div>
<br><br><br><br>

<script type='text/javascript'>
    function refreshCaptcha()
    {
        var img = document.images['captchaimg'];
        img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
    }
    //(function(d, s, id) //what the fuck is this?
</script>
<!-- CONTACT -->
<div class="wrapper" style="height: inherit;">
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
    <!-- SocialMedia -->
    <div class="right">
    <p class="customfont" style="padding: 20px; font-weight: bold;color: black; text-align: left;">Visit Us</p>
        <br><br><br><br><br>
        <div class="social" >
            <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
            <a href="https://www.instagram.com/odiosoorrore/"  class="link instagram" target="_parent blank"><span class="fa fa-instagram"></span></a>
            <a href="https://www.facebook.com/OdiosoOrrore"  class="link facebook" target="_parent blank"><span class="fa fa-facebook-square"></span></a>
            <a href="https://twitter.com/OdiosoOrrore"  class="link twitter" target="_parent blank"><span class="fa fa-twitter"></span></a>
        </div>
    </div>
    <!-- Contact form -->
    <div class="left">
    <p class="customfont" style="padding: 20px; font-weight: bold;color: black; text-align: right;">Contact Us</p>
        <form action="process.php" method="post" style="content: inherit">
            <input type="text" style="background-color: #ffffff" name="name" placeholder="Name" size="30" align="center" required><br/>
            <input type="email" style="background-color: #ffffff" name="email" placeholder="Email" size="30" align="center" required><br/>
            <textarea class="nooResize" name="message" style="background-color: #ffffff" cols="32" placeholder= "Message" rows="5" align="center" required  ></textarea><br/>
            <td align="center" valign="top"><p class="customfont" style="font-size: 20px; text-align: left;"> Validation code:</p></td>
            <!-- <input type="submit" style="background-color: #a21b0c" name="submit" value="SEND!" /> -->
            <table>
                <?php if(isset($msg)){?>
                    <tr>
                        <td colspan="2" align="left" valign="top"><?php echo $msg;?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg'><br><br>
                    <input id="captcha_code" name="captcha_code" type="text" placeholder="Enter the code above here :">
                    <br>
                    Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh.
                </tr>
                <td><input name="Submit" type="submit" onclick="return validate();" value="Send"></td>
            </table>
        </form>
    </div>
</div>
<br>
<footer>
    <div class="footer"><p class="customfont" style="font-size: 20px;">☠ Opening Hours: Monday - Thurday: 10-22 Friday - Saturday: 12-00 Sundays: 12-22<br><br><a href="admin/login.php" style="color: white">© 2016 - Odioso Orrore - ☠</a></p></div>
</footer>
</html>