<?php
$device = $_POST['device'];
$time = time();

$conn = mysqli_connect(
    'localhost',
    'daelim',
    'daelim',
    'check');

$sql = "INSERT INTO checklist (device, time) VALUES ('$device', '$time')";
mysqli_query($conn, $sql);
$sql = "UPDATE checklist SET time = '$time' WHERE device = '$device'";
mysqli_query($conn, $sql);
mysqli_close($conn);