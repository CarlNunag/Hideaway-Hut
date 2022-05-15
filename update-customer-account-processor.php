<?php
require("dbc-edited.php");

$userID = isset($_GET['userID'])?$_GET['userID']:"";
$accountStatus = isset($_GET['accountStatus'])?$_GET['accountStatus']:"";

$query= sprintf("UPDATE useraccount SET `accountStatus`='$accountStatus' WHERE `userID`='$userID'");
$result = mysqli_query($dbcon, $query);
if (!$result) {
die('Invalid query: ' . mysql_error());
}
else
{
echo '<script type="text/javascript">
window.location.href = "admin-customers.php";
</script>';
}
?>