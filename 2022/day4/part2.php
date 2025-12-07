<?php

memory_reset_peak_usage();
$start_time = microtime(true);

//= Part Two =========================================

$result = null;

$overlapP2 = 0;

for ($i=0; $i < count($secondOfPair); $i++) { 
    if (
        (intval($firstOfPair[$i][0]) <= intval($secondOfPair[$i][0])) && (intval($firstOfPair[$i][1]) >= intval($secondOfPair[$i][0]))
        ||
        (intval($secondOfPair[$i][0]) <= intval($firstOfPair[$i][0])) && (intval($secondOfPair[$i][1]) >= intval($firstOfPair[$i][0]))
        ) 
        {
            $overlapP2++;
        }
}

$result = $overlapP2;
display($result);

echo "<pre>Execution time: ".round(microtime(true) - $start_time, 4)." seconds\n";
echo "<pre>Peak memory: ".round(memory_get_peak_usage()/pow(2, 20), 4), " MiB\n\n </pre>";