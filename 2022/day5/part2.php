<?php

memory_reset_peak_usage();
$start_time = microtime(true);

//= Part Two =========================================

$result = null;
$warehouse = $finalWarehouse;

foreach ($instructions as $instruction ) {
    $pick = "stack ".$instruction["from"];
    $dest = "stack ".$instruction["to"];
    $count = intval($instruction["move"]);

    $midStep = [];
    for ($i=0; $i < $count; $i++) {    
        $crate = end($warehouse[$pick]);
        array_pop($warehouse[$pick]);
        array_unshift($midStep, $crate);
    }
    for ($j=0; $j < count($midStep); $j++) {
        $interCrate = $midStep[$j];
        $warehouse[$dest][] = $interCrate;
    }
    
}

$message = [];
foreach ($warehouse as $stack ) {
    $message[] = end($stack);
}
$key = implode("", $message);
$result = $key;

display($result);

echo "<pre>Execution time: ".round(microtime(true) - $start_time, 4)." seconds\n";
echo "<pre>Peak memory: ".round(memory_get_peak_usage()/pow(2, 20), 4), " MiB\n\n </pre>";