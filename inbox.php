<?php
include'config.php';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$from = $_COOKIE["username"];
$result = $conn->query("SELECT * FROM mail WHERE receiver = '$from'") or die($conn->error());
echo "you have ".$result->num_rows." messages<br>";

$to = $conn->real_escape_string($_REQUEST['to']);
$subject = $conn->real_escape_string($_REQUEST['subject']);
$content = $conn->real_escape_string($_REQUEST['content']);

?>
<a href="viewmsg.php">view them!</a>
