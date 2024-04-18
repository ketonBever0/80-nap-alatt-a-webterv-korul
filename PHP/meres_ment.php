<?php

$realTimes = $_POST["realTimes"];
$stopwatchTimes = $_POST["stopwatchTimes"];

$data = "$realTimes\n$stopwatchTimes";

$currentDate = date('Y-m-d H:i:s');

file_put_contents("../meresek/", $data, FILE_APPEND);


echo "<h2>Mérés lementve</h2>";
