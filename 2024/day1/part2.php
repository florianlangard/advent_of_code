<?php

memory_reset_peak_usage();
$start_time = microtime(true);

$result = "part2";

//==== Part two ===============================

$firsts = [];
$lasts = [];

foreach ($data as $key => $line) {

    preg_match_all('/\d+/', $line, $matches);
    $firsts[] = $matches[0][0];
    $lasts[] = $matches[0][1];
}

$count = array_count_values($lasts);
$similarityScores = [];

foreach ($firsts as $value) {
    
    $occurences = $count[$value] ?? 0;
    $similarityScores[] += $value * $occurences;
}

$result = array_sum($similarityScores);

display($result);

echo "<pre>Execution time: ".round(microtime(true) - $start_time, 4)." seconds\n";
echo "   Peak memory: ".round(memory_get_peak_usage()/pow(2, 20), 4), " MiB\n\n </pre>";