<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
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
                    <img src="picz/Logo1.png" style="height: 135px">
                </a>
            </div>
        </div>
        <li><a class="active" href="front.php">Home</a></li>
        <li><a href="front.php" style="float: none"><img src="picz/MENU-HOME.png" ></a></li>
        <li><a href="theNews.php" style="float: none"><img src="picz/MENU-NEWS.png"></a></li>
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
<div class="rating-form">
    <strong class="choice"><h2>Rate This Dish!</h2></strong>

    <form action="process.php" method="post">
        <input type="text" style="background-color: #caaea6"  name="name" placeholder="Name" size="30" align="center"><br/>
        <input type="text" style="background-color: #caaea6" name="email" placeholder="Email" size="30" align="right"><br/>

        <div class="stars">
            <form action>

                <input class="star star-5" id="star-5" type="radio" name="star" value="5">
                <label class="star star-5" for="star-5">
                </label>

                <input class="star star-4" id="star-4" type="radio" name="star" value="4">
                <label class="star star-4" for="star-4">
                </label>

                <input class="star star-3" id="star-3" type="radio" name="star" value="3">
                <label class="star star-3" for="star-3">
                </label>

                <input class="star star-2" id="star-2" type="radio" name="star" value="2">
                <label class="star star-2" for="star-2">
                </label>

                <input class="star star-1" id="star-1" type="radio" name="star" value="1">
                <label class="star star-1" for="star-1">
                </label>

            </form>
        </div>
        <br>

        <textarea class="nooResize" name="message" style="background-color: #caaea6" cols="30" placeholder= "Comment" rows="5" align="right"></textarea><br/>
        <style>
textarea.nooResize
            {
                resize: none;
            }
        </style>
        <input type="submit" name="submit" value="SEND!" />
    </form>
</div>

<?php
$db = mysqli_connect('localhost','root','12345','menu')
or die('Error connecting to MySQL server.');

$query = "SELECT * FROM menuitems";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

while ($row = mysqli_fetch_array($result)) {
    $mainCourse=$row['mainCourse'];
    $ingredients=$row['ingredients'];
    echo "<div align='center' style='font-size: 28px; font-family: Verdana'>" . $mainCourse. "</div><br>"."<div align='center' style='font-size: 16px; font-family: Verdana'>" .$ingredients . "</div>"."<hr>";
}

?>

</body>
</html>