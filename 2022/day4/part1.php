<?php

memory_reset_peak_usage();
$start_time = microtime(true);

$raw = file_get_contents('./data.txt');
// $data = str_replace("\n\n"," ",$raw);
$data = explode("\n", $raw);

$result = null;

//= Part One =========================================

foreach ($data as $pair) {
    $assignements[] = explode(",", $pair);
}

foreach ($assignements as $assignementPair) {
    $firstOfPair[] = explode("-", $assignementPair[0]);
    $secondOfPair[] = explode("-", $assignementPair[1]);
}

$overlap = 0;

for ($i=0; $i < count($secondOfPair); $i++) { 
    if (
        (intval($firstOfPair[$i][0]) <= intval($secondOfPair[$i][0])) && (intval($firstOfPair[$i][1]) >= intval($secondOfPair[$i][1]))
        ||
        (intval($secondOfPair[$i][0]) <= intval($firstOfPair[$i][0])) && (intval($secondOfPair[$i][1]) >= intval($firstOfPair[$i][1]))
        ) 
        {
            $overlap++;
        }
}

$result = $overlap;
display($result);

echo "<pre>Execution time: ".round(microtime(true) - $start_time, 4)." seconds\n";
echo "<pre>Peak memory: ".round(memory_get_peak_usage()/pow(2, 20), 4), " MiB\n\n </pre>";