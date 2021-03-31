<?php
$device = $_POST['device'];
$uid = $_POST['uid'];
$time = time();

$conn = mysqli_connect(
    'localhost',
    'daelim',
    'daelim',
    'visitors');
$sql = "INSERT INTO time(uid, zone1) VALUES ('$uid', '$time')";
$result = mysqli_query($conn, $sql);
