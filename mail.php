<?php
include'config.php';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$to = $conn->real_escape_string($_REQUEST['to']);
$subject = $conn->real_escape_string($_REQUEST['subject']);
$content = $conn->real_escape_string($_REQUEST['content']);
$from = $_COOKIE["username"];

$sql = "INSERT INTO mail (sender, subject, content, receiver) VALUES ('$from', '$subject', '$content', '$to')";


if ($conn->query($sql) === TRUE) {
    echo "<br> sent successfully!!!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();

?>
