<?php
$conn = mysqli_connect(
    'localhost',
    'daelim',
    'daelim',
    'check');

for($i = 0; $i <10; $i++) {
    $sql = "SELECT * FROM checklist";

    $data = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_array($data)) {
        echo (int)$data['device'];
        echo ',';
        echo (int)$data['time'];
    }
    echo '\n';
}
?>