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

    $startTime = $range['start'];
    $endTime = $range['end'];

    echo $startTime;
    echo "<br>";
    echo $endTime;
    echo "<br>";

    do {
        $randDate = new DateTime();
        $randDate->setTime(mt_rand((int)explode(":", $startTime)[0], (int)explode(":", $endTime)[0]), mt_rand((int)$startTime[1], (int)$endTime[1]), mt_rand((int)$startTime[2], (int)$endTime[2]));
        $randTime = $randDate->format('H:i:s');
    } while(strtotime($randTime)<strtotime($startTime) || strtotime($endTime)<strtotime($randTime));

    echo "<br>";
    echo $randTime;
}