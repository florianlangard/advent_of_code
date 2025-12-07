<?php

memory_reset_peak_usage();
$start_time = microtime(true);

$raw = file_get_contents("./" . $inputFile);
$data = explode("\n", $raw);

$result = "part1";

//= Part One =========================================

$diffSum = 0;
$firsts = [];
$lasts = [];

foreach ($data as $key => $line) {

    preg_match_all('/\d+/', $line, $matches);
    $firsts[] = $matches[0][0];
    $lasts[] = $matches[0][1];
}

sort($firsts);
sort($lasts);

for ($i=0; $i < count($firsts); $i++) { 
    
    $diffSum += abs($firsts[$i] - $lasts[$i]);
}


//= Print answer =========================================
display($diffSum);

echo "<pre>Execution time: ".round(microtime(true) - $start_time, 4)." seconds\n";
echo "   Peak memory: ".round(memory_get_peak_usage()/pow(2, 20), 4), " MiB\n\n </pre>";