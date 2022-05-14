<?php
require('dbc-edited.php');

$userID = $_REQUEST['userID'];
$query = "DELETE FROM useraccount where userID=$userID"; 
$result = mysqli_query($dbcon, $query) or die ( mysqli_error($dbcon));
header("Location: admin-customers.php"); 
?>