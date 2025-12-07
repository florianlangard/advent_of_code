<?php

memory_reset_peak_usage();
$start_time = microtime(true);

$raw = file_get_contents("./" . $inputFile);
// $data = str_replace("\n\n"," ",$raw);
$data = explode("\n", $raw);

$result = null;

//= Part One =========================================

$dial = 50;
$password = 0;

foreach ($data as $instruction) {
    $way = substr($instruction, 0, 1);
    $instr = explode($way, $instruction);
    $instr[0] = $way;
    
    $dial = $instr[0] == "L" ? $dial - $instr[1] : $dial + $instr[1];

    if ($dial < 0) {
        $dial = 100 - (abs($dial) % 100);
    }
    if ($dial > 100) {
        $dial = 0 + (abs($dial) % 100);
    }
    if ($dial == 100) {
        $dial = 0;
    }
    if ($dial == 0) {
        $password++;
    }
}

display($password);

echo "<pre>Execution time: ".round(microtime(true) - $start_time, 4)." seconds\n";
echo "Peak memory: ".round(memory_get_peak_usage()/pow(2, 20), 4), " MiB\n\n </pre>";