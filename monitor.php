<?php
$conn = mysqli_connect(
    'localhost',
    'daelim',
    'daelim',
    'check');

for($i = 0; $i <10; $i++) {
    $sql = "SELECT * FROM checklist";

    $data = mysqli_query($conn, $sql);
    while ($datum = mysqli_fetch_array($data)) {
        echo (int)$datum['device'];
        echo ',';
        echo (int)$datum['time'];
    }
    echo '\n';
}
?>