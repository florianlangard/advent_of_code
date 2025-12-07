<?php

memory_reset_peak_usage();
$start_time = microtime(true);

$raw = file_get_contents("./" . $inputFile);
$data = str_replace("\n\n"," ",$raw);
$data = explode(" ", $data);

//= Part One =========================================

$result = null;

foreach ($data as $item) {
    $elves[] = explode("\n",$item);
}

foreach ($elves as $elf) {
    $calories[] = array_sum($elf);
}

$result = max($calories);

display($result);

echo "<pre>Execution time: ".round(microtime(true) - $start_time, 4)." seconds\n";
echo "<pre>Peak memory: ".round(memory_get_peak_usage()/pow(2, 20), 4), " MiB\n\n </pre>";