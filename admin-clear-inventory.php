<?php
require('dbc-edited.php');

$query = "DELETE FROM purchasecounter"; 
$result = mysqli_query($dbcon, $query) or die ( mysqli_error($dbcon));
header("Location: admin-inventory.php"); 
?>