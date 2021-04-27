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

$data = mysqli_query($conn, $sql);
while ($range = mysqli_fetch_array($data)) {
    echo $range['start'];
    echo "<br>";
    echo $range['end'];
    echo "<br>";

    $startTime = $range['start'] . explode(':');
    $endTime = $range['end'] . explode(':');

    $randDate = new DateTime();
    $randDate->setTime(mt_rand((int)$startTime[0], (int)$endTime[0]), mt_rand((int)$startTime[1], (int)$endTime[1]), mt_rand((int)$startTime[2], (int)$endTime[2]));
    $randTime = $randDate->format('H:i:s');

    echo "<br>";
    echo $randTime;
}