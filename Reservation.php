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
        p.customfont {
            font-family: "Cardinal", Verdana, Tahoma, sans-serif;
        }

    </style>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>
    <body>
    <br><br><br><br><br>
    <p>Date: <input type="text" id="datepicker"></p>
    <link href="calendar.css" type="text/css" rel="stylesheet" />
<?php
include 'calendar.php';

$calendar = new Calendar();

echo $calendar->show();
?>
<footer><p class="customfont" style="font-size: 20px; position: relative; text-align: center;">☠ Opening Hours: Monday - Thurday: 10-22 Friday - Saturday: 12-00 Sundays: 12-22<br><br><a href="admin/login.php" style="color: white">© 2016 - Odioso Orrore - ☠</a></p></footer>
</body>
</head>
</html>