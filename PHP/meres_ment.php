<?php

$educator = $_POST["educator"];
$word = $_POST["word"];
$realTimes = $_POST["realTimes"];
$stopwatchTimes = $_POST["stopwatchTimes"];

$jsonFile = "../JSON/meresek.json";


$data = json_decode(file_get_contents($jsonFile), true);

$data[] = array(
    "educator" => $educator,
    "word" => $word,
    "who" => $_COOKIE["fhn"],
    "when" => date('Y-m-d H:i:s'),
    "realTimes" => explode(",", $realTimes),
    "stopwatchTimes" => explode(",", $stopwatchTimes),
    "all" => count(explode(",", $realTimes)),
    "likes" => [],
    "dislikes" => []
);


file_put_contents($jsonFile, json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));


header("Location: ../korabbiak.php");

