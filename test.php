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
$array = mysqli_query($conn, $sql);
echo $array;
echo "<br>";
//$range = mysqli_fetch_array($array)[0];
//echo $range['start'];
//echo "<br>";
//echo $range['end'];
//echo "<br>";
//$startTime = $range['start'] . explode(':');
//$endTime = $range['end'] . explode(':');
//
//$randDate = new DateTime();
//$randDate->setTime(mt_rand($startTime[0], $endTime[0]), mt_rand($startTime[1], $endTime[1]), mt_rand($startTime[2], $endTime[2]));
//$randTime = $randDate->format('H:i:s');
//
//echo "<br>";
//echo $randTime;