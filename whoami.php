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

$sql = "SELECT * FROM luckytime where date='$date'";
$data = mysqli_fetch_array(mysqli_query($conn, $sql));
if (count($data) == 0){
    $randDate = new DateTime();
    $randDate->setTime(mt_rand(10, 16), mt_rand(0, 59), mt_rand(0, 59));
    $randTime = $randDate->format('H:i:s');
    $sql = "INSERT INTO luckytime(date, time) VALUES ('$date', '$randTime')";
    mysqli_query($conn, $sql);
}

else {
    $luckyTime = $data['time'];
    echo $time;
    echo $luckyTime;
    if ($time >= strtotime($luckyTime)){
        echo "ok";
    }
}