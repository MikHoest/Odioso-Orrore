<?php
require_once ('connect.php');

$resCheck = "SELECT * FROM reservations";
$showRes = mysqli_query($conn, $resCheck) or die("Query Error");

foreach ($showRes as $res)
{
    if(strtotime($res['fromTime']) < time() && strtotime($res['toTime']) > time())
    {
        $tableRes = "UPDATE tables SET isReserved='yes' WHERE number='". $res['tableNumber']."'";
        $stableRes = mysqli_query($conn, $tableRes) or die (" query failed");
    }
    else
    {
        $tableRes ="UPDATE tables SET isReserved='no' WHERE number=" .$res['tableNumber'];
    }
}
