<?php
$host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "laundryhobshop";

$conn = mysqli_connect($host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>

