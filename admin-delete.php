<?php
require('dbc-edited.php');

$id=$_REQUEST['id'];
$query = "DELETE FROM purchasecounter WHERE id=$id"; 
$result = mysqli_query($dbcon, $query) or die ( mysqli_error($dbcon));
header("Location: admin-inventory.php"); 
?>