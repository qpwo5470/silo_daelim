<?php
$conn = mysqli_connect(
    'localhost',
    'daelim',
    'daelim',
    'check');

$sql = "SELECT * FROM checklist";

$data = mysqli_query($conn, $sql);

$zones = ["DREAM STATION&#9;", "STUDIO 401&#9;&#9;", "STUDIO 402&#9;&#9;", "STUDIO 403&#9;&#9;", "COMMUNITY CENTER", "DREAM LOUNGE&#9;"];

while ($datum = mysqli_fetch_array($data)) {
    echo "<pre>"
    echo $zones[(int)$datum['device']-1];
    echo "&#9;";
    $connection = (int)time()-(int)$datum['time']<30;
    echo $connection? "CONNECTED":"DISCONNECTED";
    echo "<br>";
}
echo "</pre>"
?>