<?php
if (isset($_POST['uid']) && !empty($_POST['uid'])) {
    $clientIP = $_SERVER['REMOTE_ADDR'];
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
    if (count($data) == 0) {
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
            mysqli_query($conn, $sql);
        }
    } else {

        $sql = "SELECT * FROM luckytoday where date='$date'";
        $data2 = mysqli_fetch_array(mysqli_query($conn, $sql));
        if (count($data2) == 0) {
            $luckyTime = $data['time'];
            if ($time >= strtotime($luckyTime)) {
                $lucky = 1;
                $sql = "INSERT INTO luckytoday(date) VALUES ('$date')";
                mysqli_query($conn, $sql);
            }
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
        if ($lucky > 0) {
            $sql = "UPDATE time SET lucky = '$lucky' WHERE uid = '$uid'";
            mysqli_query($conn, $sql);
        }
    }
    mysqli_close($conn);

    $datetime = date('Y-m-d H:i:s', $time);
    if ($lucky == 2) {
        $prepend = "[{$datetime}]\tIP {$clientIP}\tZONE {$device}\tUID {$uid}\tFORCE LUCKY\n";
    } else {
        $prepend = "[{$datetime}]\tIP {$clientIP}\tZONE {$device}\tUID {$uid}\n";
    }
    $file = 'log.txt';
    $fileContents = file_get_contents($file);
    file_put_contents($file, $prepend . $fileContents);
}
else{
    $clientIP = $_SERVER['REMOTE_ADDR'];

    date_default_timezone_set("Asia/Seoul");

    $time = time();
    $date = date('Y-m-d', $time);

    $datetime = date('Y-m-d H:i:s', $time);
    $prepend = "[{$datetime}]\tData From : {$clientIP}\n";
    $file = 'sub_log.txt';
    $fileContents = file_get_contents($file);
    file_put_contents($file, $prepend . $fileContents);
}