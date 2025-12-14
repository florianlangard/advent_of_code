<?php

memory_reset_peak_usage();
$start_time = microtime(true);

$data = explode(",", $raw);

$result = [];

//= Part Two =========================================
// dd(findRepeatedPatterns(strval(1010)));
function findRepeatedPatterns($string) {
    $len = strlen($string);
    for ($patternLen = 1; $patternLen <= $len / 2; $patternLen++) {
        
        if ($len % $patternLen !== 0) {
            continue;
        }
        
        $pattern = substr($string, 0, $patternLen);
        $repeatCount = $len / $patternLen;
        if (str_repeat($pattern, $repeatCount) === $string && $repeatCount >= 2) {
            return $string;
        }
    }
}

foreach ($data as $item) {
    $range = explode("-", $item);
    for ($i = $range[0]; $i <= $range[1]; $i++) {
        $result[] = findRepeatedPatterns(strval($i));
    }
}

display(array_sum($result));

echo "<pre>Execution time: ".round(microtime(true) - $start_time, 4)." seconds\n";
echo "Peak memory: ".round(memory_get_peak_usage()/pow(2, 20), 4), " MiB\n\n </pre>";