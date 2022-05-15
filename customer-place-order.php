<?php
require('dbc-edited.php');
session_start();

$timecheck = getdate(date("U"));

$date = "$timecheck[month] $timecheck[mday], $timecheck[year]";
$userID = isset($_GET['userID'])?$_GET['userID']:"";
$userName = isset($_GET['userName'])?$_GET['userName']:"";
$orderID = isset($_GET['orderID'])?$_GET['orderID']:"";
$productID = isset($_GET['productID'])?$_GET['productID']:"";
$productName = isset($_GET['productName'])?$_GET['productName']:"";
$productQuantity = isset($_GET['productQuantity'])?$_GET['productQuantity']:"";
$subTotal = isset($_GET['subTotal'])?$_GET['subTotal']:"";
$deliveryFee = isset($_GET['deliveryFee'])?$_GET['deliveryFee']:"";
$deliveryAddress = isset($_GET['deliveryAddress'])?$_GET['deliveryAddress']:"";
$paymentMode = isset($_GET['paymentMode'])?$_GET['paymentMode']:"";
$riderNotes = isset($_GET['riderNotes'])?$_GET['riderNotes']:"";
$contactNumber = isset($_GET['contactNumber'])?$_GET['contactNumber']:"";
$orderStatus = isset($_GET['orderStatus'])?$_GET['orderStatus']:"";
$amountPayable = isset($_GET['amountPayable'])?$_GET['amountPayable']:"";

$query = sprintf("INSERT INTO placedorders (time, userID, userName, orderID, productID, productQuantity, subTotal, deliveryFee, deliveryAddress, paymentMode, riderNotes, contactNumber, orderStatus, amountPayable, productName)
    VALUES ('$date', '$userID', '$userName', '$orderID', '$productID', '$productQuantity', '$subTotal', '$deliveryFee', '$deliveryAddress', '$paymentMode', '$riderNotes', '$contactNumber', '$orderStatus', '$amountPayable', '$productName')");


$result = mysqli_query($dbcon, $query);
if (!$result) {
die('Invalid query: ' . mysqli_error($dbcon));
}
else
{

$query = "DELETE FROM mycart"; 
$result = mysqli_query($dbcon, $query) or die ( mysqli_error($dbcon));
header("Location: customer-placed-orders.php"); 
}
?>