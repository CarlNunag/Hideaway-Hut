<?php
require("dbc-edited.php");
session_start();

$userID = isset($_GET['userID'])?$_GET['userID']:"";

$_SESSION['userID'] = $userID;

$sql = "SELECT * FROM useraccount WHERE userID='$userID'";
$result = mysqli_query($dbcon, $sql);

$count = mysqli_num_rows($result);
    if($count == 1){
             
        $_SESSION['userID'] = $userID;
            
        $_SESSION['userName'] = $userName;
        $_SESSION["login_time_stamp"] = time(); 
        header('location: customer-index.php');
    }
    else {
        echo '<script>alert("Login Error");</script>';
        echo '<script type="text/javascript">
        window.location.href = "sessionlogin-index.html";
        </script>';
    }
?>