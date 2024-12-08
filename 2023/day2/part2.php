<?php

$raw = file_get_contents('./data.txt');
// $data = str_replace("\n\n"," ",$raw);
$data = explode("\n", $raw);

$result = "";

//= Part Two =========================================

$haystack = [ "one", "two", "three", "four", "five", "six", "seven", "eight", "nine"];
$replace = ["one1one", "two2two", "three3three", "four4four", "five5five", "six6six", "seven7seven", "eight8eight", "nine9nine"];

$glob = [];

foreach ($data as $string) {
    $mid = str_replace($haystack, $replace, $string);
    $res = preg_replace("/[^0-9]+/", "", $mid);

    $first = substr($res, 0, 1);
    $last = substr($res, -1, 1);

    $num = $first . $last;
    $glob[] = $num;
}

$result = array_sum($glob);




echo "<pre>";
print_r($result);
echo "</pre>";