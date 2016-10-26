<?php
require_once("constants.php");

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
if(!$conn)
{
    die("Could Not Connect To DB!");
}
$db_select = mysqli_select_db($conn, DB_NAME);
if(!$db_select)
{
    die("Could Not Find DataBase!".mysqli_error($conn));
}