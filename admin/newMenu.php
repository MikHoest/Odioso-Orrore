<?php
 require_once("../include/session.php");
 require_once("../include/connection.php");
 require_once("../include/functions.php");
 confirm_logged_in();


?>


<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>

<body>
<h1 align="center">Welcome to the NewMenu section</h1>
<div class="rating-form">

    <form action="menuDB" method="post">
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
</html>
