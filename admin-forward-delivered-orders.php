<?php
require("dbc-edited.php");

$userID = isset($_GET['userID'])?$_GET['userID']:"";
$orderID = isset($_GET['orderID'])?$_GET['orderID']:"";
$productID = isset($_GET['productID'])?$_GET['productID']:"";
$deliveryAddress = isset($_GET['deliveryAddress'])?$_GET['deliveryAddress']:"";
$orderTotal = isset($_GET['orderTotal'])?$_GET['orderTotal']:"";
$deliveryFee = isset($_GET['deliveryFee'])?$_GET['deliveryFee']:"";
$contactNumber = isset($_GET['contactNumber'])?$_GET['contactNumber']:"";
$orderStatus = isset($_GET['orderStatus'])?$_GET['orderStatus']:"";


$query = sprintf("INSERT INTO deliveredorders (userID, orderID, productID, deliveryAddress, orderTotal, deliveryFee, contactNumber, orderStatus)
    VALUES ('$userID', '$orderID', '$productID', '$deliveryAddress', '$orderTotal', '$deliveryFee', '$contactNumber', '$orderStatus', )");

$result = mysqli_query($dbcon, $query);
if (!$result) {
die('Invalid query: ' . mysqli_error($dbcon));
}
else
{
echo '<script type="text/javascript">
window.location.href = "admin-online-orders.php";
</script>';
}
?>