<?php
include '../connection.php';
$id = $_GET['id'];
mysqli_query($con,"delete from application where application_id ='$id'");
header('location:feedback.php');
?>