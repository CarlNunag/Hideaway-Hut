<?php
require('dbc-edited.php');

$cquantity = isset($_GET['cquantity'])?$_GET['cquantity']:"";
$userinput = isset($_GET["idf"])?$_GET["idf"]:"";

$query = sprintf("UPDATE purchasecounter SET cquantity='$cquantity' WHERE id='$userinput'");
$result = mysqli_query($dbcon, $query);

if (!$result) {
echo '<script type="text/javascript">
window.location.href = "admin-place-walk-in-orders.php";
</script>';
}
else
{
echo '<script type="text/javascript">
window.location.href = "admin-place-walk-in-orders.php";
</script>';
}

?>