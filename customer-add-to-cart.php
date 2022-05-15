<?php
require("dbc-edited.php");

$userID = isset($_GET['userID'])?$_GET['userID']:"";
$productID = isset($_GET['productID'])?$_GET['productID']:"";
$productName = isset($_GET['productName'])?$_GET['productName']:"";
$productPrice = isset($_GET['productPrice'])?$_GET['productPrice']:"";
$productQuantity = isset($_GET['productQuantity'])?$_GET['productQuantity']:"";
$orderID = isset($_GET['orderID'])?$_GET['orderID']:"";

$sql = "SELECT * FROM mycart WHERE productID='$productID'";
$res = mysqli_query($dbcon, $sql);

$count = mysqli_num_rows($res);
    if($count == 1){
        echo'Product already exists in order bag';
    }
    else {
        $query = sprintf("INSERT INTO mycart (userID, productID, productName, productPrice, productQuantity, orderID)
    VALUES ('$userID', '$productID', '$productName', '$productPrice', '$productQuantity', '$orderID')");

$result = mysqli_query($dbcon, $query);
if (!$result) {
die('Invalid query: ' . mysqli_error($dbcon));
}
else
{
echo '<script type="text/javascript">
window.location.href = "customer-menu.php";
</script>';
}
    }



?>