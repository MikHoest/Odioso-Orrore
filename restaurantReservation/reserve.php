<?php
require_once ("connect.php");

$tableSelection = $_POST['table'];
$toTime = $_POST['toTime'];
$fromTime = $_POST['fomTime'];

$check = "SELECT isReserved FROM tables WHERE numbers=". + $tableSelection;

if($check != "yes" && $toTime > 0 && $toTime != 0 && $fromTime > 0 && $fromTime != 0)
{
    $book = "INSERT INTO reservations(toTime, fromTime, tableNumber) VALUES ('$toTime''$fromTime''$tableSelection')";
}
else
{
    echo "Please enter a valid fucking table something!";
}