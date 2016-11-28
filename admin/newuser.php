<?php
require_once("include/session.php");
require_once("include/connection.php");
require_once("include/functions.php");
//confirm_logged_in();
?>

<html xmlns="http://www.w3.org/1999/html">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>

<?php
// START FORM PROCESSING
if (isset($_POST['submit'])) { // Form has been submitted.
	$errors = array();

	// perform validations on the form data
	$username = trim(mysqli_real_escape_string($connection, $_POST['user']));
	$password = trim(mysqli_real_escape_string($connection, $_POST['pass']));
    $iterations = ['cost' => 10];//?What is this? = number of times hased!
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);

	$query = "INSERT INTO login (userName, password) VALUES ('{$username}', '{$hashed_password}')";

	$result = mysqli_query($connection, $query);
		if ($result) {
			$message = "User Created.";
			redirect_to("index.php");
		}
		else
		{
			$message = "User could not be created.";
			$message .= "<br />" . mysqli_error();
		}
}

if (!empty($message)) {echo "<p>" . $message . "</p>";}
?>

<div class="wrapper">
<h2>Create New User</h2>
<form action="newuser.php" method="post">
Username:
<input type="text" name="user"  maxlength="30" value="" />
Password:
<input type="password" name="pass" maxlength="30" value="" />
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
