<?php
include'config.php';

/*
username = "bob"
password = "bobknob"
email = "bob@gmail.com"
*/
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully ";
/*
// prepare and bind
$stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstname, $lastname, $email);
// set parameters and execute
$firstname = "John";
$lastname = "Doe";
$email = "john@example.com";
$stmt->execute();
*/
$username = $conn->real_escape_string($_REQUEST['username']);
$password = $conn->real_escape_string($_REQUEST['psw']);
$password2 = $conn->real_escape_string($_REQUEST['psw-repeat']);
$pass = sha1 ($password);
$email = $conn->real_escape_string($_REQUEST['email']);

$result = $conn->query("SELECT * FROM users WHERE username='$username'") or die($conn->error());
if ( $result->num_rows > 0 ) {
    echo"<br><h3>username ".$username." already exists!</h3>";
    $stmt->close();
    $conn->close();
    die;
} else {
        if ( $password == $password2 ) {
$sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$pass', '$email')";


if ($conn->query($sql) === TRUE) {
    echo "<br> New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    echo "<br> username : <h3>" . $username ."</h3>";
    echo "<br> email : <h3>" . $email ."</h3>"; 
} else {
    echo"<h1>Passwords don't match!</h1>";
}
}
$stmt->close();
$conn->close();


?>
<br>
