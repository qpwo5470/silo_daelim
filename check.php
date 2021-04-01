<?php
$device = $_POST['device'];
$time = time();

$conn = mysqli_connect(
    'localhost',
    'daelim',
    'daelim',
    'check');

$sql = "INSERT INTO device, time VALUES ('$device', '$time')";
mysqli_query($conn, $sql);
$sql = "UPDATE time SET time = '$time' WHERE device = '$device'";
mysqli_query($conn, $sql);
mysqli_close($conn);