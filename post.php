<?php
$device = $_POST['device'];
$uid = $_POST['uid'];
$time = time();

$conn = mysqli_connect(
    'localhost',
    'daelim',
    'daelim',
    'visitors');

if ($uid == '334504557509722599') {
    $sql = "TRUNCATE TABLE time";
    mysqli_query($conn, $sql);
} else {
    $sql = "INSERT INTO time(uid) VALUES ('$uid')";
    mysqli_query($conn, $sql);
    $sql = "UPDATE time SET zone{$device} = '$time' WHERE uid = '$uid'";
    mysqli_query($conn, $sql);
}
mysqli_close($conn);

$datetime = date('d-m-Y H:i:s', $time)
$prepend = "[{$datetime}]\tZONE {$device}\tUID {$uid}\n";
$file = 'log.txt';
$fileContents = file_get_contents($file);
file_put_contents($file, $prepend . $fileContents);