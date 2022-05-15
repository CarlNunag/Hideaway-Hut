<?php
require("dbc-edited.php");


$userID = isset($_GET['userID'])?$_GET['userID']:"";
$userName = isset($_GET['userName'])?$_GET['userName']:"";
$deliveryAddress = isset($_GET['deliveryAddress'])?$_GET['deliveryAddress']:"";
$contactNumber = isset($_GET['contactNumber'])?$_GET['contactNumber']:"";
$orderID = isset($_GET['orderID'])?$_GET['orderID']:"";
$accountStatus = isset($_GET['accountStatus'])?$_GET['accountStatus']:"";

$query = sprintf("INSERT INTO useraccount (userID, userName, orderID, deliveryAddress, contactNumber, accountStatus) VALUES ('$userID', '$userName', '$orderID', '$deliveryAddress', '$contactNumber', '$accountStatus')");
$result = mysqli_query($dbcon, $query);
if (!$result) {
die('Register error, please try another User ID. ' . mysqli_error($dbcon));

}
else
{
echo '<script type="text/javascript">
window.location.href = "index(1).html";
</script>';
}
?>