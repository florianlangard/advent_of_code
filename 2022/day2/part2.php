<?php

memory_reset_peak_usage();
$start_time = microtime(true);

//= Part Two =========================================

$result = null;

$scoreV2 = 0;

foreach ($round as $item) {
    if ($item[1] === "X") {
        $scoreV2 += $lose;
        switch ($round) {
            case $item[0] === "A":
                $scoreV2 += $scissors;
                break;
            case $item[0] === "B":
                $scoreV2 += $rock;
                break;
            case $item[0] === "C":
                $scoreV2 += $paper;
                break;
        }
    }
    if ($item[1] === "Y") {
        $scoreV2 += $draw;
        switch ($round) {
            case $item[0] === "A":
                $scoreV2 += $rock;
                break;
            case $item[0] === "B":
                $scoreV2 += $paper;
                break;
            case $item[0] === "C":
                $scoreV2 += $scissors;
                break;
        }
    }
    if ($item[1] === "Z") {
        $scoreV2 += $win;
        switch ($round) {
            case $item[0] === "A":
                $scoreV2 += $paper;
                break;
            case $item[0] === "B":
                $scoreV2 += $scissors;
                break;
            case $item[0] === "C":
                $scoreV2 += $rock;
                break;
        }
    }
}

$result = $scoreV2;

display($result);

echo "<pre>Execution time: ".round(microtime(true) - $start_time, 4)." seconds\n";
echo "<pre>Peak memory: ".round(memory_get_peak_usage()/pow(2, 20), 4), " MiB\n\n </pre>";