<?php
require("dbc-edited.php");

$id = isset($_GET['id'])?$_GET['id']:"";
$productname = isset($_GET['productname'])?$_GET['productname']:"";
$cquantity = isset($_GET['cquantity'])?$_GET['cquantity']:"";
$ccost = isset($_GET['ccost'])?$_GET['ccost']:"";
$ccapital = isset($_GET['ccapital'])?$_GET['ccapital']:"";

$query= sprintf("UPDATE purchasecounter SET `productname`='$productname', `cquantity`='$cquantity', `ccost`='$ccost' ,`ccapital`='$ccapital' WHERE `id`='$id'");
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