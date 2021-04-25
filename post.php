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
    if ($time >= strtotime($luckyTime)) {
        echo "ok";
    }
}

if ($uid == '334504557509722599') {
    $sql = "TRUNCATE TABLE time";
    mysqli_query($conn, $sql);
} else {
    $sql = "INSERT INTO time(uid) VALUES ('$uid')";
    mysqli_query($conn, $sql);
    $sql = "UPDATE time SET zone{$device} = '$time' WHERE uid = '$uid'";
    mysqli_query($conn, $sql);
    if ($lucky >0){
        $sql = "UPDATE time SET lucky = '$lucky' WHERE uid = '$uid'";
        mysqli_query($conn, $sql);
    }
}
mysqli_close($conn);

$datetime = date('Y-m-d H:i:s', $time);
if($lucky == 2) {
    $prepend = "[{$datetime}]\tZONE {$device}\tUID {$uid}\tFORCE LUCKY\n";
}
else {
    $prepend = "[{$datetime}]\tZONE {$device}\tUID {$uid}\n";
}
$file = 'log.txt';
$fileContents = file_get_contents($file);
file_put_contents($file, $prepend . $fileContents);