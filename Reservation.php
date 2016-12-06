<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservations</title>
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
            <li><a class="active" href="front.php">Home</a></li>
        <li><a href="front.php" style="float: none"><img src="picz/MENU-HOME.png" ></a></li>
        <li><a href="Menu.php" style="float: none"><img src="picz/MENU-MENU.png" ></a></li>
        <li><a href="theNews.php" style="float: none"><img src="picz/MENU-NEWS.png"></a></li>
        <li><a href="admin/login.php" style="float: none"><img src="picz/MENU-LOGIN.png" ></a></li>
        <li class="icon">
            <a href="javascript:void(0)" style="font-size:40px;" onclick="myFunction()">
                <p class="customfont"> ☰    ☰ </p>
            </a>
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
-->
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
        font-family: "SPOOKYHOUSE";
        src: url(fonts/SPOOKYHOUSE.TTF) format("truetype");
    }
    p.customfont {
        font-family: "SPOOKYHOUSE", Verdana, Tahoma;
    }
</style>
<div class="heading" style="padding-top: 190px;">
    <p class="customfont" style="font-size: 28px; padding: 30px;">Reserve your table here!
    </p>
</div>

<div id ="setup">
    <div class="restaurant">
        <?php
        require_once('restaurantReservation/connect.php');

        $display = "SELECT * FROM reservation";
        $show_data = mysqli_query($conn, $display) or die ("query error");

        foreach($show_data as $table)
        {
            if($table['isReserved']=='no')
            {
            }
            else
            {
                echo "<img data-number='invalid' class='tables taken' src='picz/tableRes.png' />";
            }
        }
        ?>
    </div>
</div>
<div>
    <input type="text" id="output" name="table">
</div>
<div>
    <form action="../restaurantReservation/reserve.php" method="post">
        Table:<input type="text" id="output"><br/>
        From:<input type="text"><br/>
        To:<input type="text"><br/>

    </form>
</div>


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" ></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->

<!-- Latest compiled and minified JavaScript -->
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="js/add.js" type="application/javascript"></script>

</body>
</html>
