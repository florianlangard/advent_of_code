<?php

memory_reset_peak_usage();
$start_time = microtime(true);

$raw = file_get_contents('./data.txt');
// $data = str_replace("\n\n"," ",$raw);
$data = explode("\n", $raw);

$result = null;

//= Part One =========================================

$priorityList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

foreach ($data as $rucksack) {
    $orderedRucksack[] = str_split($rucksack, (strlen($rucksack)/2));
}

foreach ($orderedRucksack as $compartment) {
    $singleValues0 = str_split($compartment[0]);
    $singleValues1 = str_split($compartment[1]);
    $duplicatedItems[] = array_intersect($singleValues0, $singleValues1);
}

$result = 0;
foreach ($duplicatedItems as $foundItem) {
    $firstKey = array_key_first($foundItem);
    $singlePriority = $foundItem[$firstKey];
    $result += (strpos($priorityList, $singlePriority) + 1);
}

display($result);

echo "<pre>Execution time: ".round(microtime(true) - $start_time, 4)." seconds\n";
echo "<pre>Peak memory: ".round(memory_get_peak_usage()/pow(2, 20), 4), " MiB\n\n </pre>";