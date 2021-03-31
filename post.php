<?php
$device = $_POST['device'];
$uid = $_POST['uid'];
$time = time();

$conn = mysqli_connect(
    'localhost',
    'daelim',
    'daelim',
    'visitors');

if ($uid == '334504557509722599'){
    $sql = "TRUNCATE TABLE time";
}
else {
    $sql = "INSERT INTO time(uid, zone{$device}) VALUES ('$uid', '$time')";
}
$result = mysqli_query($conn, $sql);
mysqli_close($conn);