<?php

memory_reset_peak_usage();
$start_time = microtime(true);

$raw = file_get_contents("./" . $inputFile);
$data = explode("\n", $raw);

$result = null;

//= Part One =========================================

$joltages = [];

foreach ($data as $bank) {

    $maxValue = 0;

    $exploded = str_split($bank);
    for ($i=0; $i < count($exploded); $i++) {

        $ten = $exploded[$i];
        for ($j=$i + 1; $j < count($exploded); $j++) { 
            $unit = $exploded[$j];
            $testValue = intval($ten . $unit);
            if ($testValue > $maxValue) $maxValue = $testValue;
        }
    }

    $joltages[] = $maxValue;
}

display(array_sum($joltages));

echo "<pre>Execution time: ".round(microtime(true) - $start_time, 4)." seconds\n";
echo "Peak memory: ".round(memory_get_peak_usage()/pow(2, 20), 4), " MiB\n\n </pre>";