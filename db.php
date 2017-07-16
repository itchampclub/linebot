<?php
$servername = "mysql.hostinger.in.th";
$username = "u184683754_esp32";
$password = "iydgmvot";
$dbname = "u184683754_esp32";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE esp32 SET command='opend' WHERE id=1";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
