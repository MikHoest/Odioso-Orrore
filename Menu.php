<?php
require_once("admin/include/session.php");
require_once("admin/include/connection.php");
require_once("admin/include/functions.php");
?>

<html lang="en">
<div class="fixed-bg">
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
            font-family: Verdana;
            font-size: 0px;
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
            padding: 0px;
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
                    <img src="picz/Logo1.png" style="height: 135px">
                </a>
            </div>
        </div>
        <li><a class="active" href="front.php">Home</a></li>
        <li><a href="front.php" style="float: none"><img src="picz/MENU-HOME.png" ></a></li>
        <li><a href="theNews.php" style="float: none"><img src="picz/MENU-NEWS.png"></a></li>
        <li><a href="Reservation.php" style="float: none"><img src="picz/MENU-RESERVATIONS.png" ></a></li>
        <li class="icon">
            <a href="javascript:void(0)" style="font-size:40px;" onclick="myFunction()">  </a>
        </li>
    </ul>



</div>
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
<br>

<div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
</div>
-->
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
    }
</script>

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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
$query = "SELECT * FROM dailyspecial";
mysqli_query($connection, $query) or die('Error querying database.');

$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($result))
{
    $dailySpecial=$row['dailySpecial'];
    $ingredients=$row['ingredients'];
    $price=$row['price'];
    $review=$row['review'];
    echo "<div class='foodwrapper'><table style='float: left'><p class=\"customfont\" style=\"font-size: 28px; padding: 20px; font-weight: bold; text-align: left;\">" . $dailySpecial. "</div><br><br><br>"."<div align='left' style='font-size: 16px; font-family: Verdana'>" .$ingredients . "</div>"."<br>"."<div align='center' style='font-size: 16px; font-family: Verdana'>" . "Price: " .$price . ".- DKK</div></table></div><br>";
}
?>

<style type="text/css">
    @font-face {
        font-family: "Cardinal";
        src: url(fonts/Cardinal.ttf) format("truetype");
    }
    p.customfont {
        font-family: "Cardinal", Verdana, Tahoma, sans-serif;
    }
</style>
    <?php
    $query = "SELECT * FROM menuitems";
    mysqli_query($connection, $query) or die('Error querying database.');

    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($result)) {
        $mainCourse=$row['mainCourse'];
        $ingredients=$row['ingredients'];
        $price=$row['price'];
        $review=$row['review'];
        echo "<div class='foodwrapper' ><table style='float: none'><p class=\"customfont\" style=\"font-size: 28px; padding: 20px; font-weight: bold; text-align: left;\">" . $mainCourse. "</div><br><br><br>"."<div align='left' style='font-size: 16px; font-family: Verdana'>" .$ingredients . "</div>"."<br>"."<div align='center' style='font-size: 16px; font-family: Verdana'>" . "Price: " .$price . ".- DKK</div></table></div><br>";
    }

    ?>
</head>
<div class="container">

</div>


</body>
<div class="footer"><p style="margin: 20px; float: none;">© 2016 | Odioso Orrore<li><a href="admin/login.php" style="float: none"><img src="picz/eyeBall.png" width="50" height="50"></a></li></p>
</div>
</html>
<!--
<input type="text" style="background-color: #ffffff" name="name" placeholder="Name" size="30" align="center"><br/>
<input type="text" style="background-color: #ffffff" name="email" placeholder="Email" size="30" align="right"><br/>
<textarea class="nooResize" name="message" style="background-color: #ffffff" cols="32" placeholder= "Comment" rows="5" align="right"></textarea><br/>
<style>
textarea.nooResize
{
    resize: none;
}
</style>
<input type="submit" name="publish" value="SEND!" />
<br>
-->