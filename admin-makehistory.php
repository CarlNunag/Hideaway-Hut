<?php
require("dbc-edited.php");

$walkinorderID = isset($_GET['walkinorderID'])?$_GET['walkinorderID']:"";
$productname = isset($_GET['name-submit'])?$_GET['name-submit']:"";
$cquantity = isset($_GET['quantity-submit'])?$_GET['quantity-submit']:"";
$ctotal = isset($_GET['order-total-submit'])?$_GET['order-total-submit']:"";
$ccash = isset($_GET['cash-submit'])?$_GET['cash-submit']:"";
$cchange = isset($_GET['change-submit'])?$_GET['change-submit']:"";
$ccapital = isset($_GET['capital-submit'])?$_GET['capital-submit']:"";
$ccost = isset($_GET['cost-submit'])?$_GET['cost-submit']:"";

$query = sprintf("INSERT INTO orderhistory (walkinorderID, productname, cquantity, ctotal, ccash, cchange, ccapital, ccost) VALUES ('$walkinorderID', '$productname', '$cquantity', '$ctotal', '$ccash', '$cchange', '$ccapital', '$ccost')");
$result = mysqli_query($dbcon, $query);

if ($result) {
echo '<script type="text/javascript">
window.location.href = "admin-place-walk-in-orders.php";
</script>';
}

else {
   echo '<script type="text/javascript">
window.location.href = "admin-place-walk-in-orders.php";
</script>'; 
}
?>