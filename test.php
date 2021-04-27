<?php
date_default_timezone_set("Asia/Seoul");

$time = time();
$date = date('Y-m-d', $time);


$conn = mysqli_connect(
    'localhost',
    'daelim',
    'daelim',
    'visitors');


$sql = "SELECT * FROM luckyrange WHERE no = 0";

$rangeData = mysqli_query($conn, $sql);
while ($range = mysqli_fetch_array($rangeData)) {
    $startTime = $range['start'];
    $endTime = $range['end'];

    do {
        $randDate = new DateTime();
        $randDate->setTime(mt_rand((int)explode(":", $startTime)[0], (int)explode(":", $endTime)[0]), mt_rand(0, 59), mt_rand(0, 59));
        $randTime = $randDate->format('H:i:s');
    } while (strtotime($randTime) < strtotime($startTime) || strtotime($endTime) < strtotime($randTime));

    $sql = "INSERT INTO luckytime(date, time) VALUES ('$date', '$randTime')";
}
mysqli_query($conn, $sql);
mysqli_close($conn);
