<?php

memory_reset_peak_usage();
$start_time = microtime(true);

$raw = file_get_contents('./sample.txt');
// $data = str_replace("\n\n"," ",$raw);
$data = explode("\n", $raw);

$result = "";

//= Part One =========================================
$arr = [];

foreach ($data as $key => $value) {
    $arr[$key] = str_split($value, 1);
}

$positions = [];

foreach ($arr as $rowIndex => $row) {
    foreach ($row as $colIndex => $value) {
        $positions[$value][] = ["y" => "$rowIndex", "x" => "$colIndex"];
    }
}

foreach ($positions["X"] as $coords) {
    // print_r($coords);
    $y = $coords["y"];
    $x = $coords["x"];


$validPos = [
    ["y" => $y - 1, "x" => $x],     // up
    ["y" => $y + 1, "x" => $x],     // down
    ["y" => $y, "x" => $x - 1],     // left
    ["y" => $y, "x" => $x + 1],     // right
    ["y" => $y - 1, "x" => $x - 1], // top-left
    ["y" => $y - 1, "x" => $x + 1], // top-right
    ["y" => $y + 1, "x" => $x - 1], // bottom-left
    ["y" => $y - 1, "x" => $x + 1]  // bottom-right
];

foreach ($validPos as $pos) {
    $posY = $pos["y"];
    $posX = $pos["x"];

    // Vérifier si les coordonnées adjacentes sont valides
    if (isset($arr[$posY][$posX]) && $arr[$posY][$posX] === "M") {
        echo "'X' en (" . $y . ", " . $x . ") et 'M' en (" . $posY . ", " . $posX . ") | \n";
    }
}
}



echo "<pre>";
print_r($arr);
echo "</pre>";

echo "<pre>Execution time: ".round(microtime(true) - $start_time, 4)." seconds\n";
echo "   Peak memory: ".round(memory_get_peak_usage()/pow(2, 20), 4), " MiB\n\n </pre>";