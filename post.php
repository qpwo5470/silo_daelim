<?php
$device = $_POST['device'];
$uid = $_POST['uid'];

$conn = mysqli_connect(
    'localhost',
    'daelim',
    'daelim',
    'visitors');
$sql = "INSERT INTO time(uid, zone0) VALUES ('$uid')";
$result = mysqli_query($conn, $sql);
