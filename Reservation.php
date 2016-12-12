<?php
require_once("admin/include/session.php");
require_once("admin/include/connection.php");
require_once("admin/include/functions.php");

if(isset($_POST{'submit'})) {

    $name = trim(htmlspecialchars(mysqli_real_escape_string($connection,$_POST['name'])));
    $telephone = trim(htmlspecialchars(mysqli_real_escape_string($connection,$_POST['telephone'])));
    $tableNumber = trim(htmlspecialchars(mysqli_real_escape_string($connection,$_POST['table'])));
    $timeID = trim(htmlspecialchars(mysqli_real_escape_string($connection,$_POST['timeID'])));
    $date = trim(htmlspecialchars(mysqli_real_escape_string($connection,$_POST['date'])));
    $numberGuest = $_POST['numberGuest'];
    if($tableNumber <= 4)
    {
        echo "Please select a valid Table!";
    }
    else
    {
    $query = "INSERT INTO `reservation`(`name`, `tableID`, `telephone`, `date`, `timeID`) VALUES ('$name', '$tableNumber', '$telephone', '$date', '$timeID')";
    mysqli_query($connection, $query) or die('Error querying database.');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8 utf-8">
    <title>Reservations</title>
    <link rel="stylesheet" type="text/css" href="bootstrap" />
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        @font-face {
            font-family: "Cardinal";
            src: url(fonts/Cardinal.ttf) format("truetype");
        }
        p.customfont {
            font-family: "Cardinal", Verdana, Tahoma, sans-serif;
        }
    </style>
    <script>
        // When the user clicks on div, open the popup
        function myFunction() {
            var popup = document.getElementById('myPopup');
            popup.classList.toggle('show');
        }
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>
<li id="home"><a href="front.php" style="float: inherit"><img src="picz/MENU-HOME%20-%20Kopi.png" onmouseover="this.src='picz/MENU-HOME-HOVER'" onmouseout="this.src='picz/MENU-HOME%20-%20Kopi.png'"></a></li>
<br><br><br>
<div class="wrapper" style="height: inherit; align-content: center";>
    <form action="Reservation.php" method="post">
        <table style=" width: 100%">
            <p class="customfont" style="font-size: 45px; padding: 20px; font-weight: bold; text-align: center; color: black;">Reserve a Table</p> <!--  -->
            <tr>
                <th>
                    <p class="customfont" style="font-size: 30px; text-align: left; color: black;">Name<th>
                    <input type="text" name="name" placeholder="Name" size="30" align="center" required autofocus>
                </th>
            </tr>
            <tr>
                <th>
                    <p class="customfont" style="font-size: 30px; text-align: left; color: black;">Phone<th>
                    <input type="text" name="telephone" placeholder="Phone number" minlength="8" maxlength="11" required>
                </th>
            </tr>
            <tr>
                <th>
                    <p class="customfont" style="font-size: 30px; text-align: left; color: black;">Date<th>
                    <input type="text" name="date" id="datepicker" required></p>
                </th>
            </tr>
            <tr>
                <th>
                    <p class="customfont" style="font-size: 30px; text-align: left; color: black;">Time<th>
                    <select name="timeID">
                        <option value="1700">17:00</option><option value="1730">17:30</option><option value="1800">18:00</option><option value="1830">18:30</option><option value="1900">19:00</option><option value="1930">19:30</option><option value="2000">20:00</option><option value="2030">20:30</option><option value="2100">21:00</option>
                    </select>
                </th>
            </tr>
            <tr>
                <th>
                    <p class="customfont" style="font-size: 30px; text-align: left; color: black;">Table Number<th>
                    <select name="table">
                        <option value="1">Table 1</option><option value="2">Table 2</option><option value="3">Table 3</option><option value="4">Table 4</option>
                    </select>
                </th>
            </tr>
            <tr>
                <th>
                    <p class="customfont" style="font-size: 30px; text-align: left; color: black;">Number Of Guests<th>
                    <input type="number" name="numberGuest" min="1" max="6" required></p>
                </th>
            </tr>
            <tr>
                <th>
                    <p class="customfont" style="font-size: 15px; text-align: left; color: black;">For groups larger then 6 please call and reserve</p>
                </th>
            </tr>
            <tr>
                <th>
                    <input name="submit" type="submit" onclick="return validate();" value="Book Your Table">
                    <!--<input name="Submit" type="submit" value="Check if Available">-->
                </th>
            </tr>
        </table>
    </form>
</div>
<br>
<!--<body>
    <br><br><br>
<link href="calendar.css" type="text/css" rel="stylesheet" />
<?php
include 'calendar.php';

$calendar = new Calendar();

echo $calendar->show();
?>
</body>-->
    <div class="container"></div>
<footer>
    <p class="customfont" style="font-size: 20px; position: relative; text-align: center;">☠ Opening Hours: Monday - Thurday: 10-22 Friday - Saturday: 12-00 Sundays: 12-22<br><br><a href="admin/login.php" style="color: white">© 2016 - Odioso Orrore - ☠</a></p>
</footer>
</head>
</html>