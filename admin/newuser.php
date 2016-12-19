<?php
require_once("include/session.php");
require_once("include/connection.php");
require_once("include/functions.php");
confirm_logged_in();

// START FORM PROCESSING
if (isset($_POST['submit'])) { // Form has been submitted.
	$errors = array();

	// perform validations on the form data
	$name = trim(mysqli_real_escape_string($connection, $_POST['name']));
	$username = trim(mysqli_real_escape_string($connection, $_POST['user']));
	$password = trim(mysqli_real_escape_string($connection, $_POST['pass']));
	$confirm_password = trim(mysqli_real_escape_string($connection, $_POST['con_pass']));
    $iterations = ['cost' => 10];//?What is this? = number of times hased!
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);
	//$hashed_confirm_password = password_hash($confirm_password, PASSWORD_BCRYPT, $iterations);
	if($password != $confirm_password)
	{
		$message = "Password Don´t match";
	}
	else{
		//$query = "INSERT INTO login (fname, userName, password) VALUES ($name, $username, $hashed_password)";
		$query = "INSERT INTO `login` (`ID`, `fname`, `userName`, `password`) VALUES (NULL, '$name', '$username', '$hashed_password')";
		$result = mysqli_query($connection, $query);
		redirect_to("backendSwitch.php");
	}
}
if (!empty($message))
{
	echo "<p>" . $message . "</p>";
}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
	</head>
	<body><h2 align="center">Create New User</h2>
		<div class="wrapper" style="margin-left: 25%">
			<form action="newuser.php" method="post">
			Full Name:
			<input type="text" name="name"  maxlength="50" value="" /><br>
			Username:
			<input type="text" name="user"  maxlength="30" value="" /><br>
			Password:
			<input type="password" name="pass" maxlength="30" value="" /><br>
			Confirm password:
			<input type="password" name="con_pass" maxlength="30" value="" /><br>
			<input type="submit" name="submit" value="Create" />
			</form>
		</div>
	</body>
</html>
<?php
if (isset($connection))
{
	mysqli_close($connection);
}
?>
