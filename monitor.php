<?php
$conn = mysqli_connect(
    'localhost',
    'daelim',
    'daelim',
    'check');

$sql = "SELECT * FROM checklist";

$data = mysqli_query($conn, $sql);

$zones = ["DREAM STATION\t", "STUDIO 401\t", "STUDIO 402\t", "STUDIO 403\t", "COMMUNITY CENTER", "DREAM LOUNGE\t"];

while ($datum = mysqli_fetch_array($data)) {
    echo $zones[(int)$datum['device']-1];
    echo "\t\t";
    $connection = (int)time()-(int)$datum['time']<30;
    echo $connection? "CONNECTED":"DISCONNECTED";
    echo "<br>";
}
?>