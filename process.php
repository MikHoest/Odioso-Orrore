<?php
    $mymail = "frid4463@easv365.dk";
    $name = $_POST["name"];
    $subject = $_POST["subject"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    if ($_POST["submit"])
    {
        $body = "message\n\nName: $name\nEmail: $email";
        mail ($mymail, $subject, $body,"From: $email\n");
        echo "Thanks for your E-mail $name!";
    }
?>


