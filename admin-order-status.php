<?php
require('dbc-edited.php');

$orderStatus = isset($_GET['orderStatus'])?$_GET['orderStatus']:"";
$orderID = isset($_GET["orderID"])?$_GET["orderID"]:"";

$query = sprintf("UPDATE placedorders SET orderStatus= '$orderStatus' WHERE orderID= '$orderID'");
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
