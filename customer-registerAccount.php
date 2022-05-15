<?php
require("dbcon.php");

$userID = isset($_GET['userID'])?$_GET['userID']:"";
$orderID = isset($_GET['orderID'])?$_GET['orderID']:"";
$deliveryAddress = isset($_GET['deliveryAddress'])?$_GET['deliveryAddress']:"";
$contactNumber = isset($_GET['contactNumber'])?$_GET['contactNumber']:"";


$query = sprintf("INSERT INTO useraccount (userID, orderID, deliveryAddress, contactNumber)
    VALUES ('$userID', '$orderID', '$deliveryAddress', '$contactNumber')");

$result = mysql_query($query);
if (!$result) {
die('Invalid query: ' . mysql_error());
}
else
{
echo '<script type="text/javascript">
window.location.href = "customer-loginform.php";
</script>';
}
?>