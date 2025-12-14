<?php

memory_reset_peak_usage();
$start_time = microtime(true);

$data = explode(",", $raw);

display($data);

$result = [];

//= Part Two =========================================
dd(findRepeatedPatterns("1010"));

function findRepeatedPatterns($string) {
    $len = strlen($string);
    // display("(func) string : " . $string . "\nstrlen(string) : " . strlen($string) / 2);
    for ($patternLen = 1; $patternLen <= $len / 2; $patternLen++) {

        if ($len % $patternLen !== 0) {
            display("continue");
            continue;
        }

        $pattern = substr($string, 0, $patternLen);
        $repeatCount = $len / $patternLen;
        // display("Pattern Length: " . $patternLen);
        if (str_repeat($pattern, $repeatCount) === $string) {
            return $string;
        } else {
            return null;
        }
    }
}

foreach ($data as $item) {
    $range = explode("-", $item);
    // display("range : ",$range); 
    for ($i = $range[0]; $i <= $range[1]; $i++) {
        dd($i);
        $result[] = findRepeatedPatterns(strval($i));
        // display($result);
        // for ($patternLen = 1; $patternLen <= strlen($i) / 2; $patternLen++) {
        //     display("Pattern Length: " . $patternLen);
        // }
        // $pattern = substr($i, 0, strlen($i));
        // $str = str_split($i, strlen($i) / 2);
        // // display($str);
        // if ($str[0] === $str[1]) {
        //     $result[] = $i;
        // }
        // break;
    }
    //break; // 1 loop only
}

display($result);

echo "<pre>Execution time: ".round(microtime(true) - $start_time, 4)." seconds\n";
echo "Peak memory: ".round(memory_get_peak_usage()/pow(2, 20), 4), " MiB\n\n </pre>";