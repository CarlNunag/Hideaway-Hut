<?php
require('dbc-edited.php');

$id=$_REQUEST['id'];
$query = "DELETE FROM orderhistory where productID=$id"; 
$result = mysqli_query($dbcon, $query) or die ( mysqli_error($dbcon));
header("Location: admin-walk-in-orders.php"); 
?>