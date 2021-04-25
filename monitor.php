<?php
$conn = mysqli_connect(
    'localhost',
    'daelim',
    'daelim',
    'check');

$sql = "SELECT * FROM checklist";

$data = mysqli_query($conn, $sql);

$zones = ["DREAM STATION", "STUDIO 401", "STUDIO 402", "STUDIO 403", "COMMUNITY CENTER", "DREAM LOUNGE"];

while ($datum = mysqli_fetch_array($data)) {
    echo "DEVICE ";
    echo $zones[(int)$datum['device']];
    echo "\t";
    $connection = (int)time()-(int)$datum['time']<30;
    echo $connection? "CONNECTED":"DISCONNECTED";
    echo "<br>";
}
?>