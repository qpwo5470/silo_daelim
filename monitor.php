<?php
$conn = mysqli_connect(
    'localhost',
    'daelim',
    'daelim',
    'check');

$sql = "SELECT * FROM checklist";

$data = mysqli_query($conn, $sql);
while ($datum = mysqli_fetch_array($data)) {
    echo "DEVICE ";
    echo (int)$datum['device'];
    echo "    ";
    $connection = (int)time()-(int)$datum['time']<30;
    echo $connection? "CONNECTED":"DISCONNECTED";
}
echo "/";
?>