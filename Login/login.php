<?php require_once("include/connection.php"); ?>
<?php require_once("include/session.php"); ?>
<?php require_once("include/functions.php"); ?>
<?php
		if (logged_in()) {
		redirect_to("front.php");
	}
	// START FORM PROCESSING
	if (isset($_POST['submit'])) { // Form has been submitted.
        $username = trim(htmlspecialchars(mysqli_real_escape_string($connection, $_POST['user'])));
        $password = trim(htmlspecialchars(mysqli_real_escape_string($connection,$_POST['pass'])));


        $query = "SELECT user, pass FROM users WHERE user = '{$username}' LIMIT 1";
        echo $query;
        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) == 1) {
            // username/password authenticated
            // and only 1 match
            $found_user = mysqli_fetch_array($result);
            if(password_verify($password, $found_user['pass'])){
                $_SESSION['user_id'] = $found_user['id'];
                $_SESSION['user'] = $found_user['user'];
                redirect_to("../front.php");
            } else {
                // username/password combo was not found in the database
                $message = "Username/password combination incorrect.<br />
					Please make sure your caps lock key is off and try again.";
            }
        }
    } else
    { // Form has not been submitted.
        if (isset($_GET['logout']) && $_GET['logout'] == 1)
        {
            $message = "You are now logged out.";
        }
    }
if (!empty($message))
{
    echo "<p>" . $message . "</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LOGIN</title>
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
                <a href="../front.php">
                    <img src="picz/notlogo2.jpg" style="height: 135px">
                </a>
            </div>
        </div>
        <li><a href="../front.php" style="float: none"><img src="picz/MENU-HOME.png" ></a></li>
        <li><a href="../Menu.php" style="float: none"><img src="picz/MENU-MENU.png" ></a></li>
        <li><a href="../theNews.php" style="float: none"><img src="picz/MENU-NEWS.png"></a></li>
        <li><a href="../Reservations.php" style="float: none"><img src="picz/MENU-RESERVATIONS.png" ></a></li>
        <li class="icon">
            <a href="javascript:void(0)" style="font-size:30px;" onclick="myFunction()">
                <p class="customfont"> ☰    ☰ </p>
            </a>
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
</body>
</html>
<?php
if (isset($connection)){mysqli_close($connection);}
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>



<h2>Please login</h2>
<form action="" method="post">
    <input type="text" name="user" placeholder="Username" maxlength="30" value="" />
    <input type="password" name="pass" placeholder="Password" maxlength="30" value="" />
    <br>
    <input type="submit" name="submit" value="Login" />
</form>
<h2>New User</h2>
<form action="newuser.php" method="post">
    <input type="submit" name="submit" value="CREATE" />
</form>
</body>
</html>

<!--comment out-->
