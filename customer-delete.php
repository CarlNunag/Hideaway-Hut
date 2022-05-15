<?php
require('dbc-edited.php');

$id=$_REQUEST['id'];
$query = "DELETE FROM mycart WHERE productID=$id"; 
$result = mysqli_query($dbcon, $query) or die ( mysqli_error($dbcon));
header("Location: customer-mycart.php"); 
?>