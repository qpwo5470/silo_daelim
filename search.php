<?php
$device = $_POST['device'];
$uid = $_POST['uid'];

$conn = mysqli_connect(
    'localhost',
    'daelim',
    'daelim',
    'visitors');

$sql = "SELECT * FROM time WHERE uid='$uid'";

$data = mysqli_query($conn, $sql);
while ($datum = mysqli_fetch_array($data)) {
    echo $uid;
    echo $datum['uid'];
    echo '/';
    echo $datum['zone1'];
    echo '/';
    echo $datum['zone2'];
    echo '/';
    echo $datum['zone3'];
    echo '/';
    echo $datum['zone4'];
    echo '/';
    echo $datum['zone5'];
    echo '/';
    echo $datum['zone6'];
    echo "\n";
}
?>