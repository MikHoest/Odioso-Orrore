<?php
require_once("include/session.php");
require_once("include/connection.php");
require_once("include/functions.php");


    if (logged_in()) {
		redirect_to("index.php");
	}
	// START FORM PROCESSING
	if (isset($_POST['submit'])) { // Form has been submitted.
        $username = trim(htmlspecialchars(mysqli_real_escape_string($connection, $_POST['user'])));
        $password = trim(htmlspecialchars(mysqli_real_escape_string($connection,$_POST['pass']))); //sanitized well


        $query = "SELECT `ID`, `userName`, `password` FROM `login` WHERE `userName` = ('$username') LIMIT 1";
        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) == 1)
        {
            // username/password authenticated
            // and only 1 match
            $found_user = mysqli_fetch_array($result);
            if(password_verify($password, $found_user['password']))
            {
                $_SESSION['user_id'] = $found_user['ID'];
                $_SESSION['user'] = $found_user['userName'];
                redirect_to("index.php");
            }
            else
            {
                // username/password combo was not found in the database
                $message = "Username/password combination incorrect.<br/>
					Please make sure your caps lock key is off and try again.";
            }
        }
    }
    else
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
    <link rel="stylesheet" type="text/css" href="../bootstrap" />
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
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
<?php
if (isset($connection)){mysqli_close($connection);}
?>
<div class="wrapper" style="margin-left: 25%">
<h2>Please login</h2>
    <form action="login.php" method="post">
    <input type="text" name="user" placeholder="Username" maxlength="30" value="" />
    <br>
    <input type="password" name="pass" placeholder="Password" maxlength="30" value="" />
    <br>
    <input type="submit" name="submit" value="Login" />
    <h2><a href="../front.php">Frontpage</a></h2>
</form>
<br>
</div>
</html>

<!--comment out-->
