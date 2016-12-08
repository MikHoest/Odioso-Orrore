<?php
    $mymail = "frid4463@easv365.dk";
    $name = $_POST["name"];
    //$subject = $_POST["subject"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $nameErr = $emailErr = $subjectErr = $messageErr = "";
    $name = $email = $subject = $message = "";


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["submit"]))
    {
        $emailErr = "Email is required";
    }
    else
    {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $emailErr = "Invalid email format";
        }
    }
}
else
{
    $body = "message\n\nName: $name\nEmail: $email";
    mail ($mymail, $body,"From: $email\n");
    echo "Thanks for your E-mail $name!";
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


