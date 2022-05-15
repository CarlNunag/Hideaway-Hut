<?php
$servername = "localhost";
$database = "u472819618_hideaway";
$username = "u472819618_hideawayun";
$password = "Hideawaypass1";

$dbcon = mysqli_connect($servername, $username, $password, $database);

$db_select = mysqli_select_db($dbcon, $database) or die(mysqli_error());


if (!$dbcon) {
    die("Connection failed: " . mysqli_connect_error());
}


?>