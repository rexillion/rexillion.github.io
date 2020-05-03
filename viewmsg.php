<?php
include'config.php';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$from = $_COOKIE["username"];
$result = $conn->query("SELECT * FROM mail WHERE receiver = '$from'") or die($conn->error());
$msg = $result->fetch_assoc();
print_r($msg);

?>

