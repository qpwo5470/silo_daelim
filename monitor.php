<?php
$time = time();

$conn = mysqli_connect(
    'localhost',
    'daelim',
    'daelim',
    'check');

$sql = "SELECT * FROM checklist";
$data = mysqli_query($conn, $sql);
mysqli_close($conn);
print($data);
?>