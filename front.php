<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Odioso Orrore</title>
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
        li a:hover
        {

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
    <li><a class="active" href="Front.html">Home</a></li>
    <li><a href="Menu.php" style="float: none"><img src="picz/MENU-MENU.png" ></a></li>
    <li><a href="theNews.php" style="float: none"><img src="picz/MENU-NEWS.png"></a></li>
    <li><a href="Reservation.php" style="float: none"><img src="picz/MENU-RESERVATIONS.png" ></a></li>
    <li><a href="login.php" style="float: none"><img src="picz/MENU-LOGIN.png" ></a></li>
    <li class="icon">
        <a href="javascript:void(0)" style="font-size:30px;" onclick="myFunction()">
            <p class="customfont"> ☰    ☰ </p>
        </a>

    </li>
    </ul>



</div>

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

<div class="slideshow-container">

    <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="picz/slide2.png" style="width:100%">
       </div>

       <div class="mySlides fade">
           <div class="numbertext">2 / 3</div>
           <img src="picz/slide1.png" style="width:100%">
       </div>

       <div class="mySlides fade">
           <div class="numbertext">3 / 3</div>
           <img src="picz/slide2.png" style="width:100%">
       </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

   </div>
   <br>

   <div style="text-align:center">
       <span class="dot" onclick="currentSlide(1)"></span>
       <span class="dot" onclick="currentSlide(2)"></span>
       <span class="dot" onclick="currentSlide(3)"></span>
   </div>

   <script>
       var slideIndex = 0;
       showSlides();

       function showSlides() {
           var i;
           var slides = document.getElementsByClassName("mySlides");
           var dots = document.getElementsByClassName("dot");
           for (i = 0; i < slides.length; i++) {
               slides[i].style.display = "none";
           }
           slideIndex++;
           if (slideIndex> slides.length) {slideIndex = 1}
           for (i = 0; i < dots.length; i++) {
               dots[i].className = dots[i].className.replace(" active", "");
           }
           slides[slideIndex-1].style.display = "block";
           dots[slideIndex-1].className += " active";
           setTimeout(showSlides, 5000);
       }
   </script>


   <style type="text/css">
    @font-face {
    font-family: "SPOOKYHOUSE";
           src: url(fonts/SPOOKYHOUSE.TTF) format("truetype");
       }
       p.customfont {
    font-family: "SPOOKYHOUSE", Verdana, Tahoma, sans-serif;
       }
   </style>

   <div class="heading" style="text-align: center;">
       <p class="customfont" style="font-size: 38px; padding: 30px;">Celebrating the scariest of Italian cuisine since 2016!
       </p>
   </div>

   <div class="news-section" >

       <p class="customfont" style="font-size: 28px; padding: 30px;"><a href='theNews.php' style="color: #000000">Read the latest from Odioso Orrore!</a></p>



<?php
$db = mysqli_connect('localhost','root','12345','news')
or die('Error connecting to MySQL server.');

$query = "SELECT * FROM news LIMIT 2";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

while ($row = mysqli_fetch_array($result)) {
    $title=$row['title'];
    $description=$row['description'];
    echo "<div id='content' align='center' style='font-size: 28px; font-family: Verdana'>" . $title. "</div><br>"."<div align='center' style='font-size: 16px; font-family: Verdana'>" .$description . "</div>"."<br>";
}
?>
   </div>


   <div class="daily-special" >

       <p class="customfont" style="font-size: 28px; padding: 30px;"><a href='Menu.php' style="color: #000000" >The Daily Special!</a></p>
       <form>

       </form>

   </div>
   <br>
   <div class="rating-form">
       <strong class="choice"><h2>Contact</h2></strong>

       <form action="process.php" method="post">
       <input type="text" style="background-color: #caaea6"  name="name" placeholder="Name" size="30" align="center"><br/>
       <input type="text" style="background-color: #caaea6" name="email" placeholder="Email" size="30" align="right"><br/>
       <textarea class="nooResize" name="message" style="background-color: #caaea6" cols="30" placeholder= "Message" rows="5" align="right"></textarea><br/>
       <style>
textarea.nooResize
           {
               resize: none;
           }
       </style>
       <input type="submit" name="submit" value="SEND!" />
   </form>
   </div>
</body>
<br>
<footer><p style="margin: 20px; float: left;">© 2016 | Odioso Orrore</p></footer>
</html>