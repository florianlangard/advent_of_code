<?php

memory_reset_peak_usage();
$start_time = microtime(true);

$result = "";

//==== Part two ===============================
$safes = 0;
$index = 0;
$minGap = 1;
$maxGap = 3;

display($data);

foreach ($data as $key => $report) {
    $line = explode(" ", $report);
    $res = isValidLine2($line);
    display($res);
    if ($res != 'invalid') {
        $safes++;
    }
}



function isValidLine2(array $line) {

    $asc = true;
    $desc = true;
    $skip = 0;
    $minGap = 1;
    $maxGap = 3;

    $startValue = $line[0];

    for ($i = 1; $i < count($line); $i++) {

        
        $diff = $line[$i] - $line[$i - 1];
        if (!($diff > $minGap && $diff <= $maxGap) ) {
            dd($line[$i], $line[$i - 1], $diff);
        }

        if (!($line[$i] > $startValue && ($diff > 1 && $diff <= 3))) {
            // asc
            $skip++;
            if ($skip > 0) {
                $asc = false;
            }
        }
        if (!($line[$i] < $startValue && ($diff > 1 && $diff <= 3))) {
            // desc
            $skip++;
            if ($skip > 0) {
                $desc = false;
            }
        }
        // $startValue = $line[$i];
        // display($diff);
    }

    if (!($asc) || !($desc)) {
        return 'invalid';
    } else {
        return 'valid';
    }
}

// display($safes);

echo "<pre>Execution time: ".round(microtime(true) - $start_time, 4)." seconds\n";
echo "Peak memory: ".round(memory_get_peak_usage()/pow(2, 20), 4), " MiB\n\n </pre>";