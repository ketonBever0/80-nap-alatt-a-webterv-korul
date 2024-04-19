<?php

$educator = $_POST["educator"];
$word = $_POST["word"];
$realTimes = $_POST["realTimes"];
$stopwatchTimes = $_POST["stopwatchTimes"];

$jsonFile = "../JSON/meresek.json";

$user = "";

$data = json_decode(file_get_contents($jsonFile), true);

$data[] = array(
    "educator" => $educator,
    "word" => $word,
    "who" => $user,
    "at" => date('Y-m-d_H:i:s'),
    "realTimes" => explode(",", $realTimes),
    "stopwatchTimes" => explode(",", $stopwatchTimes),
    "all" => count(explode(",", $realTimes)),
    "likes" => [],
    "dislikes" => []
);


file_put_contents($jsonFile, json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));


header("Location: http://localhost/wt_projekt/oldalak/korabbiak.php");

