<?php

memory_reset_peak_usage();
$start_time = microtime(true);

$raw = file_get_contents('./data.txt');
// $data = str_replace("\n\n"," ",$raw);
$data = $raw;

$result = null;

//= Part One =========================================

for ($i=0; $i < strlen($data)-3; $i++) { 
    
    $buffer = substr($data, $i, 4);

    $haystack = str_split($buffer, 1);

    $filteredHaystack = array_unique($haystack);
    if (count($filteredHaystack) === count($haystack)) {
        $result = $i + 4;
        break;
    }
}

display($result);

echo "<pre>Execution time: ".round(microtime(true) - $start_time, 4)." seconds\n";
echo "<pre>Peak memory: ".round(memory_get_peak_usage()/pow(2, 20), 4), " MiB\n\n </pre>";