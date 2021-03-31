<?php
//$device = $_POST['device'];
//$uid = $_POST['uid'];
$uid = '123123';
$time = time();

$conn = mysqli_connect(
    'localhost',
    'daelim',
    'daelim',
    'visitors');
$sql = "INSERT INTO time(uid, zone1, zone2, zone3, zone4, zone5, zone6) VALUES ('$uid', '$time', '$time', '$time', '$time', '$time', '$time')";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);

//$myfile = fopen('result.txt', 'w');
//fwrite($myfile, $result);
//fclose($myfile);