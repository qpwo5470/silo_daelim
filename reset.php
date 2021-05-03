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

$sql = "TRUNCATE TABLE time";
mysqli_query($conn, $sql);

$datetime = date('Y-m-d H:i:s', $time);
$prepend = "[{$datetime}]\tDATA RESET";
$file = 'log.txt';
$fileContents = file_get_contents($file);
file_put_contents($file, $prepend . $fileContents);

echo '<script>history.go(-1);</script>';