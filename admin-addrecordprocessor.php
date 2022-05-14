<?php
require("dbc-edited.php");

$id = isset($_GET['id'])?$_GET['id']:"";
$productname = isset($_GET['productname'])?$_GET['productname']:"";
$cquantity = isset($_GET['cquantity'])?$_GET['cquantity']:"";
$ccost = isset($_GET['ccost'])?$_GET['ccost']:"";
$capital = isset($_GET['ccapital'])?$_GET['ccapital']:"";

$query = sprintf("INSERT INTO purchasecounter (id, productname, cquantity, ccost, ccapital) VALUES ('$id', '$productname', '$cquantity', '$ccost', '$capital')");
$result = mysqli_query($dbcon, $query);
if (!$result) {
die('Invalid query: ' . mysql_error());
}
else
{
echo '<script type="text/javascript">
window.location.href = "admin-inventory.php";
</script>';
}
?>