<?php
echo exec('whoami');
$time = time();

date_default_timezone_set("Asia/Seoul");
$date = date('Y-m-d', $time);


$conn = mysqli_connect(
    'localhost',
    'daelim',
    'daelim',
    'visitors');


$sql = "TRUNCATE TABLE luckytime";
mysqli_query($conn, $sql);
$sql = "TRUNCATE TABLE luckytoday";
mysqli_query($conn, $sql);
$sql = "TRUNCATE TABLE time";
mysqli_query($conn, $sql);