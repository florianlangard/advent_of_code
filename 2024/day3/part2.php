<?php

memory_reset_peak_usage();
$start_time = microtime(true);

$data = file_get_contents('./data.txt');
// $data = str_replace("\n\n"," ",$raw);
// $data = explode("\n", $raw);

$result = "";

//= Part Two =========================================
unset($matches, $r);
$pr = [];

preg_match_all('/mul\(\d+,\d+\)|do\(\)|don\'t\(\)/', $data, $matches);

$isActive = true;

foreach ($matches[0] as $key => $item) {

    if ($item == "don't()") {
        $isActive = false;
    }
    elseif ($item == "do()") {
        $isActive = true;
    }
    elseif ($isActive) {
        preg_match('/\d+,\d+/', $item, $mul);
        $r = explode(",", $mul[0]);
        $pr[] = array_product($r);
    }
}


echo "<pre>";
print_r(array_sum($pr));
echo "</pre>";

echo "<pre>Execution time: ".round(microtime(true) - $start_time, 4)." seconds\n";
echo "Peak memory: ".round(memory_get_peak_usage()/pow(2, 20), 4), " MiB\n\n </pre>";