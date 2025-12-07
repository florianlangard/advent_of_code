<?php

memory_reset_peak_usage();
$start_time = microtime(true);

//= Part Two =========================================

$result = null;

for ($i=0; $i < strlen($data)-13; $i++) { 
        
    $buffer = substr($data, $i, 14);

    $haystack = str_split($buffer, 1);

    $filteredHaystack = array_unique($haystack);
    if (count($filteredHaystack) === count($haystack)) {
        $result = $i + 14;
        break;
    }
}

display($result);

echo "<pre>Execution time: ".round(microtime(true) - $start_time, 4)." seconds\n";
echo "<pre>Peak memory: ".round(memory_get_peak_usage()/pow(2, 20), 4), " MiB\n\n </pre>";