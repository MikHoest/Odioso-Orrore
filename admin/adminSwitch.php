<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Odioso Orrore</title>
    <link rel="stylesheet" type="text/css" href="bootstrap" />
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
            color: rgb(255, 255, 255);
            font-style: normal;
            text-decoration: none;
        }
        .vertical_line
        {
            height:150px;
            width:1px;
            background:#000;
        }
        @font-face {
            font-family: "Cardinal";
            src: url(fonts/Cardinal.ttf) format("truetype");
        }
        p.customfont {
            font-family: "Cardinal", Verdana, Tahoma, sans-serif;
        }
    </style>
</head>
<body>
<div class="wrapper"  style="background-color: #ffffff; opacity: 0.8;">
<h4><a href="index.php?page=home">HOME</a></h4><br>
<h4><a href="index.php?page=newNews">ADD NEWS</a></h4><br>
<h4><a href="index.php?page=newMenu">ADD MENU ITEMS</a></h4><br>
<h4><a href="index.php?page=newDrink">ADD NEW DRINKS</a></h4><br>
<h4><a href="index.php?page=newDailySpecial">ADD NEW DAILY SPECIAL</a></h4><br>
<h4><a href="index.php?page=newUser">CREATE USER</a></h4><br>
<h4><a href="../front.php">FRONTPAGE</a></h4><br>
<h4><a href="logout.php">LOGOUT</a></h4><br>
</div>
</body>
</html>


