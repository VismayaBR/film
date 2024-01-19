<?php
include '../connection.php';
$id = $_GET['id'];
mysqli_query($con,"delete from previous_work where work_id = '$id'");
header('location:previous_work_view.php');
?>