<?php
require("dbcon.php");
session_start();
if(isset($_POST['save']))
{
    extract($_POST);
    $sql=mysql_query("SELECT * FROM useraccount where userID='$userID'");
    $row  = mysql_fetch_array($sql);
    if(is_array($row))
    {   
        $_SESSION["userID"] = $row['userID'];
        header("Location: customer-myaccount.php"); 
    }
    else
    {
        echo "Invalid User ID";
    }
}
?>

