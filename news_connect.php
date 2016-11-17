
<?php
/*
//UNUSED just for funsies
$mysqli = new mysqli("localhost", "root", "12345", "news");
if ($mysqli->connect_errno) {
    echo "Failed to connect to Database: " . $mysqli->connect_error;
}

$query = $mysqli->query("SELECT * FROM news");
$row = $query->fetch_assoc();
echo $row['title'];

$user="root";
$pass="12345";
    $DBH = new PDO('mysql:host=localhost;dbname=news', $user, $pass);
    foreach ($DBH->query('SELECT * FROM news') as $row) {
        echo $row[1];
    }
    $DBH = null;


$servername = "localhost:8080";
$username = "root";
$password = "123456";
$db = "news";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("INSERT INTO news (title, description, date) VALUES (:title, :description, :date)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':date', $date);

    $title = "Title 01";
    $description = "The Descriptions 02";
    $date = "07-11-2016";
    $stmt->execute();

    echo "Created successfullyferfdjfnsjf";

}
catch (PDOException $e){
    echo "Error: " . $e->getMessage();
}
$conn = null;
/*
$sql = $conn->prepare("INSERT INTO news (title, description, date) VALUES (?,?,?)");

$sql->bindParam(1, $title);
$sql->bindParam(2, $description);
$sql->bindParam(3, $date);
$sql->execute(); */
*/