<?php

memory_reset_peak_usage();
$start_time = microtime(true);

$raw = file_get_contents("./" . $inputFile);
// $data = str_replace("\n\n"," ",$raw);
$data = explode(",", $raw);

// display($data);

$result = [];

//= Part One =========================================
foreach ($data as $item) {
    $range = explode("-", $item);
    // display($range);

    for ($i = $range[0]; $i <= $range[1]; $i++) {
        // display($i);
        if (strlen($i) % 2 != 0) {
            continue;
        }
        $str = str_split($i, strlen($i) / 2);
        // display($str);
        if ($str[0] === $str[1]) {
            $result[] = $i;
    }

    // break; // 1 loop only
    }
}


display(array_sum($result));

echo "<pre>Execution time: ".round(microtime(true) - $start_time, 4)." seconds\n";
echo "Peak memory: ".round(memory_get_peak_usage()/pow(2, 20), 4), " MiB\n\n </pre>";