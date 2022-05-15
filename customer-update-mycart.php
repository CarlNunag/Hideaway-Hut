<?php
require("dbc-edited.php");

$userID = isset($_GET['userID'])?$_GET['userID']:"";
$productID= isset($_GET['productID'])?$_GET['productID']:"";
$productName = isset($_GET['productName'])?$_GET['productName']:"";
$productQuantity = isset($_GET['productQuantity'])?$_GET['productQuantity']:"";
$productPrice = isset($_GET['productPrice'])?$_GET['productPrice']:"";

$query = sprintf("INSERT INTO mycart (userID, productID, productName, quantity, productPrice) VALUES ('$productID', '$productName', '$productQuantity', '$productPrice')");
$query= sprintf("UPDATE mycart SET `userID`='$userID', `productID`='$productID', `productName`='$productName', `productQuantity`='$productQuantity', `productPrice`='$productPrice' WHERE `productID`='$productID'");
$result = mysqli_query($dbcon, $query);
if (!$result) {
die('Invalid query: ' . mysqli_error($dbcon));
}
else
{
echo '<script type="text/javascript">
window.location.href = "customer-mycart.php";
</script>';
}
?>