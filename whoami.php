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


$randTime = '05:06:00';
$sql = "UPDATE luckytime SET time = '$randTime' WHERE date = '$date'";
mysqli_query($conn, $sql);

$sql = "TRUNCATE TABLE luckytoday";
mysqli_query($conn, $sql);