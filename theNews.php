<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News</title>
    <link rel="stylesheet" type="text/css" href="bootstrap" />
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: rgba(177, 21, 21, 0);
            font-family: Verdana;
            font-size: 0px;
            text-align: center;
        }

        li {
            float: none;
            display: inline-block;

        }

        li a {
            display: inline-block;
            color: #fefffd;
            padding: 0px;
        }

        li a:hover {

            background-color: rgba(255, 104, 107, 0);
            color: rgba(177, 21, 21, 0.8);
            font-style: normal;
            text-decoration: none;
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
        <li><a class="active">Space</a></li>
        <li><a href="front.php" style="float: none"><img src="picz/MENU-HOME.png" ></a></li>
        <li><a href="Menu.php" style="float: none"><img src="picz/MENU-MENU.png" ></a></li>
        <li><a href="Reservation.php" style="float: none"><img src="picz/MENU-RESERVATIONS.png" ></a></li>
        <li><a href="Login/login.php" style="float: none"><img src="picz/MENU-LOGIN.png" ></a></li>
        <li class="icon">
            <a href="javascript:void(0)" style="font-size:40px;" onclick="myFunction()">
                <p class="customfont"> ☰    ☰ </p>
            </a>
        </li>
    </ul>



</div>
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
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <title>OO</title>
    <style>
        body
        {
            font-family: Verdana,sans-serif;
            font-size: 0.9em;
        }

        div#header, div#footer
        {
            padding: 10px;
            color: white;
            background-color: #b81515;
        }

        div#content
        {
            margin-left: 25%;
            padding: 5px;
            background-color: #b81515;
        }

        div.article  {
            margin: 5px;
            padding: 10px;
            background-color: #dbdbdb;
        }

        div#menu ul {
            padding: 0;
        }

        div#menu ul li {
            display: inline;
            margin: 5px;
        }
    </style>
</head>
<body>

<div id="content "id="header">
    <h1>Odioso Orrore NEWS</h1>
</div>

<div id="menu">
    <ul>
        <li>News</li>
    </ul>
</div>

<div id="content" style="align-content: center; font-size: 16px; max-width: 800px">
<?php
$db = mysqli_connect('localhost','root','12345','news')
or die('Error connecting to MySQL server.');

$query = "SELECT * FROM news";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

while ($row = mysqli_fetch_array($result)) {
    $title=$row['title'];
    $description=$row['description'];
    echo "<div align='center' style='font-size: 28px; font-family: Verdana'>" . $title. "</div><br>"."<div align='center' style='font-size: 16px; font-family: Verdana'>" .$description . "</div>"."<hr>";
}

?>

</div>
<div id="footer">
    <p>© 2016 | Odioso Orrore</p>
</div>

</body>
</html>
    </body>
</html>