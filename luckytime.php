<?php
$start_hour = $_POST['start_hour'];
$start_minute = $_POST['start_minute'];
$start_second = $_POST['start_second'];
$end_hour = $_POST['end_hour'];
$end_minute = $_POST['end_minute'];
$end_second = $_POST['end_second'];
$password = $_POST['password'];

if (strcmp($password, "LuckyDream") == 0) {
    $setDateTime = new DateTime();
    $setDateTime->setTime($start_hour, $start_minute, $start_second);
    $setStartTime = $setDateTime->format('H:i:s');

    $setDateTime = new DateTime();
    $setDateTime->setTime($end_hour, $end_minute, $end_second);
    $setEndTime = $setDateTime->format('H:i:s');

    date_default_timezone_set("Asia/Seoul");

    $conn = mysqli_connect(
        'localhost',
        'daelim',
        'daelim',
        'visitors');;
    $sql = "UPDATE luckyrange SET start = '$setStartTime', end = '$setEndTime' WHERE no = 0";
    mysqli_query($conn, $sql);

    mysqli_close($conn);

    $time = time();
    $datetime = date('Y-m-d H:i:s', $time);
    $prepend = "[{$datetime}]\tLUCKY TIME RANGE SET FROM " . $setStartTime . " TO " . $setEndTime . "\n";
    $file = 'log.txt';
    $fileContents = file_get_contents($file);
    file_put_contents($file, $prepend . $fileContents);

    echo "럭키타임 범위가 [" . $setStartTime. " - ". $setEndTime . "] 으로 설정되었습니다.";
    echo '<input type="button" value="뒤로가기"onclick="javascripｔ:history.go(-1)">';
} else {
    echo "잘못된 패스워드";
    echo '<input type="button" value="뒤로가기"onclick="javascripｔ:history.go(-1)">';
}