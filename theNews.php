
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
                <a href="Front.html">
                    <img src="picz/notlogo2.jpg" style="height: 135px">
                </a>
            </div>
        </div>
        <li><a href="Front.html" style="float: none"><img src="picz/MENU-HOME.png" ></a></li>
        <li><a href="Menu.html" style="float: none"><img src="picz/MENU-MENU.png" ></a></li>
        <li><a href="Reservations.html" style="float: none"><img src="picz/MENU-RESERVATIONS.png" ></a></li>
        <li><a href="Login.html" style="float: none"><img src="picz/MENU-LOGIN.png" ></a></li>
        <li class="icon">
            <a href="javascript:void(0)" style="font-size:40px;" onclick="myFunction()"> ☰Navigation☰ </a>
        </li>
    </ul>



</div>
<div class="slideshow-container">

    <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="picz/slide1.png" style="width:100%">
        <div class="text">CAPTION</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="picz/slide1.png" style="width:100%">
        <div class="text">Caption Two</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="picz/slide1.png" style="width:100%">
        <div class="text">Caption Three</div>
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
            margin: 5px;
            padding: 10px;
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

<div id="header">
    <h1>Odioso Orrore NEWS</h1>
</div>

<div id="menu">
    <ul>
        <li>News</li>
    </ul>
</div>

<div style="padding-left:50px; font-size: 16px;">
<?php
$db = mysqli_connect('localhost','root','12345','news')
or die('Error connecting to MySQL server.');

$query = "SELECT * FROM news";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

while ($row = mysqli_fetch_array($result)) {
    echo $row['title'] . ' ' . $row['description'] . ': ' . $row['date'] .'<br />';
}
?>
<div id="footer">
    <p>© 2016 | Odioso Orrore</p>
</div>

</body>
</html>
    </body>
</html>