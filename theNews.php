<?php
$db = mysqli_connect('localhost','root','12345','news')
or die('Error connecting to MySQL server.');

$query = "SELECT * FROM news";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

while ($row = mysqli_fetch_array($result)) {
    echo $row['title'] . ' ' . $row['description'] . ': ' . $row['date'] .'<br />';
}
?>
