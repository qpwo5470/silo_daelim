<?php
echo exec('whoami');
$time = time();

date_default_timezone_set("Asia/Seoul");
$date = date('Y-m-d', $time);