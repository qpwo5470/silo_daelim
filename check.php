<?php
$device = $_POST['device'];
$time = time();
$ip = $_SERVER['REMOTE_ADDR'];

$conn = mysqli_connect(
    'localhost',
    'daelim',
    'daelim',
    'check');

$sql = "INSERT INTO checklist (device, time, ip) VALUES ('$device', '$time', '$ip')";
mysqli_query($conn, $sql);
$sql = "UPDATE checklist SET time = '$time' WHERE device = '$device'";
mysqli_query($conn, $sql);
mysqli_close($conn);