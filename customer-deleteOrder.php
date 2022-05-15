<?php
require('dbc-edited.php');

$id=$_REQUEST['id'];
$query = "DELETE FROM placedorders WHERE orderID=$id"; 
$result = mysqli_query($dbcon, $query) or die ( mysqli_error($dbcon));
header("Location: customer-placed-orders.php"); 
?>