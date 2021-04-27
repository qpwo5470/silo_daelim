<?php
$device = $_POST['device'];
$uid = $_POST['uid'];
$lucky = (int)$_POST['lucky'];

date_default_timezone_set("Asia/Seoul");

$time = time();
$date = date('Y-m-d', $time);


$conn = mysqli_connect(
    'localhost',
    'daelim',
    'daelim',
    'visitors');

$sql = "SELECT * FROM luckyrange WHERE index=0";
$range = mysqli_fetch_array(mysqli_query($conn, $sql))[0];
$startTime = $range['start'] . explode(':');
$endTime = $range['end'] . explode(':');

$randDate = new DateTime();
$randDate->setTime(mt_rand($startTime[0], $endTime[0]), mt_rand($startTime[0], $endTime[0]), mt_rand($startTime[0], $endTime[0]));
$randTime = $randDate->format('H:i:s');

echo $randTime;