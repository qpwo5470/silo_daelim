<?php
$hour = $_POST['time_hour'];
$minute = $_POST['time_minute'];
$second = $_POST['time_second'];
$password = $_POST['password'];

if($password == "LuckyDream") {
    $setTime = $hour . ":" . $minute . ":" . $second;

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
        $sql = "INSERT INTO luckytime(date, time) VALUES ('$date', '$setTime')";
        mysqli_query($conn, $sql);
    } else {
        $sql = "UPDATE luckytime SET time = '$setTime' VALUES WHERE date = '$date'";
        mysqli_query($conn, $sql);
    }

    mysqli_close($conn);

    $datetime = date('Y-m-d H:i:s', $time);
    $prepend = "[{$datetime}]\tMANUAL LUCKY TIME SET " . $setTime;
    $file = 'log.txt';
    $fileContents = file_get_contents($file);
    file_put_contents($file, $prepend . $fileContents);

    echo "럭키타임이 [".$setTime."] 으로 설정되었습니다.";
}
echo "잘못된 패스워드";
echo "찐: "."LuckyDream";
echo $password;