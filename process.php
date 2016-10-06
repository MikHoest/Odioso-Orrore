<?php
    $mymail = "frid4463@easv365.dk";
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    if ($_POST["submit"])
    {
        $body = "message\n\nName: $name\nEmail: $email";
        mail ($mymail, $subject, $body,"From: $email\n");
        echo "Thanks for your E-mail $name!";
    }
?>