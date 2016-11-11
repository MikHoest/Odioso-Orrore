<?php require_once("include/connection.php"); ?>
<?php require_once("include/session.php"); ?>
<?php require_once("include/functions.php"); ?>
<?php
		if (logged_in()) {
		redirect_to("front.php");
	}
 ?>
 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>

 <?php
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

 <h2>Please login</h2>
 <form action="" method="post">
	 <input type="text" name="user" placeholder="Username" maxlength="30" value="" />
	 <input type="password" name="pass" placeholder="Password" maxlength="30" value="" />
	 <br>
	 <input type="submit" name="submit" value="Login" />
 </form>
 <h2>New User</h2>
 <form action="Login/newuser.php" method="post">
	 <input type="submit" name="submit" value="CREATE" />
 </form>
</body>
</html>
<?php
if (isset($connection)){mysqli_close($connection);}
?>