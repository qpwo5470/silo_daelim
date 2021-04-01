<?php
$conn = mysqli_connect(
    'localhost',
    'daelim',
    'daelim',
    'check');

$sql = "SELECT * FROM checklist";

$data = mysqli_query($conn, $sql);
while ($datum = mysqli_fetch_array($data)) {
    echo (int)$datum['device'];
    echo ',';
    echo (int)$datum['time'];
}
echo '\n';
?>