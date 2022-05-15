<?php
require("dbcon.php");

$orderID = isset($_GET['orderID'])?$_GET['orderID']:"";
$feedback = isset($_GET['feedback-'])?$_GET['feedback']:"";

$query = sprintf("INSERT INTO feedback (orderID, feedback) values('$orderID', '$feedback')");
$result = mysql_query($query);
if (!$result) {
die('Invalid query: ' . mysql_error());
}
else
{
echo '<script type="text/javascript">
window.location.href = "customer-orderFeedback.php";
</script>';
}
?>