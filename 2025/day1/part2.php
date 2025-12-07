<?php

memory_reset_peak_usage();
$start_time = microtime(true);

//= Part Two =========================================

$start = 50;
$password = 0;

foreach ($data as $instruction) {
    $way = substr($instruction, 0, 1);
    $instr = explode($way, $instruction);
    $instr[0] = $way;

    $new = $instr[0] == "L" ? $start - $instr[1] : $start + $instr[1];

    $rounds = intdiv($instr[1], 100);
    $password += $rounds;

    if ($new < 0) {
        $new = 100 - (abs($new) % 100);
    }
    if ($new > 100) {
            $new = 0 + (abs($new) % 100);
    }
    if ((abs($new) % 100) == 0) {
        $new = 0;
    }
    if ($new == 0) {
        $password++;
    }
    if ($instr[0] == "L") {
        if ($new > $start && $start != 0 && $new != 0) {
            $password++;
        }
    } else {
        if ($new < $start && $start != 0 && $new != 0) {
            $password++;
        }
    }
    $start = $new;
}

display($password);

echo "<pre>Execution time: ".round(microtime(true) - $start_time, 4)." seconds\n";
echo "Peak memory: ".round(memory_get_peak_usage()/pow(2, 20), 4), " MiB\n\n </pre>";