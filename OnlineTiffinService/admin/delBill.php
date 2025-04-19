<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM billrecords WHERE paymentid = '".$_SESSION['paymentId']."'");
header("location:BillRecords.php");  

?>