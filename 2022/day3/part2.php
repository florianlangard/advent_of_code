<?php

memory_reset_peak_usage();
$start_time = microtime(true);

//= Part Two =========================================

$result = null;

$group = array_chunk($data, 3);

foreach ($group as $elf) {
    $firstElf = str_split($elf[0]);
    $secondElf = str_split($elf[1]);
    $thirdElf = str_split($elf[2]);
    $commonItem[] = array_intersect($firstElf, $secondElf, $thirdElf);
}
$result = 0;
foreach ($commonItem as $foundItem) {
    $firstKey = array_key_first($foundItem);
    $singlePriority = $foundItem[$firstKey];
    $result += (strpos($priorityList, $singlePriority) + 1);
}

display($result);

echo "<pre>Execution time: ".round(microtime(true) - $start_time, 4)." seconds\n";
echo "<pre>Peak memory: ".round(memory_get_peak_usage()/pow(2, 20), 4), " MiB\n\n </pre>";