<?php

memory_reset_peak_usage();
$start_time = microtime(true);

//= Part Two =========================================

$result = null;



display($result);

echo "<pre>Execution time: ".round(microtime(true) - $start_time, 4)." seconds\n";
echo "Peak memory: ".round(memory_get_peak_usage()/pow(2, 20), 4), " MiB\n\n </pre>";