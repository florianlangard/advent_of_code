<?php

memory_reset_peak_usage();
$start_time = microtime(true);

$raw = file_get_contents('./sample.txt');
// $data = str_replace("\n\n"," ",$raw);
$data = explode("\n", $raw);

$result = "";

//= Part One =========================================




echo "<pre>";
print_r($result);
echo "</pre>";

echo "<pre>Execution time: ".round(microtime(true) - $start_time, 4)." seconds\n";
echo "   Peak memory: ".round(memory_get_peak_usage()/pow(2, 20), 4), " MiB\n\n </pre>";