<?php

memory_reset_peak_usage();
$start_time = microtime(true);

$raw = file_get_contents('./data.txt');
// $data = str_replace("\n\n"," ",$raw);
$data = explode("\n", $raw);

$result = null;

//= Part One =========================================
foreach ($data as $item) {
    $round[] = explode(" ", $item);
}

$lose = 0; // X
$draw = 3; // Y
$win = 6; // Z

$rock = 1;
$paper = 2;
$scissors = 3;

$score = 0;

foreach ($round as $item) {
    if( $item[1] === "X") {
        $score += 1;
        switch ($round) {
            case $item[0] === "A":
                $score += $draw;
                break;
            case $item[0] === "B":
                $score += $lose;
                break;
            case $item[0] === "C":
                $score += $win;
                break;
        }
    }
    if( $item[1] === "Y") {
        $score += 2;
        switch ($round) {
            case $item[0] === "A":
                $score += $win;
                break;
            case $item[0] === "B":
                $score += $draw;
                break;
            case $item[0] === "C":
                $score += $lose;
                break;
        }
    }
    if( $item[1] === "Z") {
        $score += 3;
        switch ($round) {
            case $item[0] === "A":
                $score += $lose;
                break;
            case $item[0] === "B":
                $score += $win;
                break;
            case $item[0] === "C":
                $score += $draw;
                break;
        }
    }
}

$result = $score;

display($result);

echo "<pre>Execution time: ".round(microtime(true) - $start_time, 4)." seconds\n";
echo "<pre>Peak memory: ".round(memory_get_peak_usage()/pow(2, 20), 4), " MiB\n\n </pre>";