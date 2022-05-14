<?php
require("dbc-edited.php");
session_start();

$adminID = isset($_GET['adminID'])?$_GET['adminID']:"";
$_SESSION['adminID'] = $adminID;

$sql = "SELECT * FROM adminaccount WHERE adminID='$adminID'";
$result = mysqli_query($dbcon, $sql);

$count = mysqli_num_rows($result);
    if($count == 1){
             
        $_SESSION['adminID'] = $adminID;
        $_SESSION["login_time_stamp"] = time(); 
        header('location: admin-dashboard.php');
    }
    else {
        echo '<script type="text/javascript">
        window.location.href = "index(3).html";
        </script>';
    }
?>