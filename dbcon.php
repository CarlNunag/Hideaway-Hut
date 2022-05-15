<?php
$servername = "localhost";
$database = "u472819618_hideaway";
$username = "u472819618_hideawayun";
$password = "Hideawaypass1";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
mysqli_close($conn);
?>