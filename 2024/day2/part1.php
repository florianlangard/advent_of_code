<?php

memory_reset_peak_usage();
$start_time = microtime(true);

$raw = file_get_contents("./" . $inputFile);
// $data = str_replace(" ","",$raw);
$data = explode("\n", $raw);

$result = "";

//= Part One =========================================

$safes = 0;

foreach ($data as $key => $report) {
    $line = explode(" ", $report);
    $res = isValidLine($line);

    if ($res != 'invalid') {
        $safes++;
    }
}

function isValidLine(array $line) : string {

    $asc = true;
    $desc = true;

    for ($i = 1; $i < count($line); $i++) {

        $diff = $line[$i] - $line[$i - 1];

        if (!($diff >= 1 && $diff <= 3)) {
            $asc = false;
        }

        if (!($diff <= -1 && $diff >= -3)) {
            $desc = false;
        }

        // if ($line[$i] <= $line[$i - 1]) {
        //     $asc = false;
        // }
        // if ($line[$i] >= $line[$i - 1]) {
        //     $desc = false;
        // }
        if (!$asc && !$desc) {
            return 'invalid';
        }
    }

    if ($asc) return 'asc';
    if ($desc) return 'desc';
    return 'invalid';
}


display($safes);

echo "<pre>Execution time: ".round(microtime(true) - $start_time, 4)." seconds\n";
echo "Peak memory: ".round(memory_get_peak_usage()/pow(2, 20), 4), " MiB\n\n </pre>";