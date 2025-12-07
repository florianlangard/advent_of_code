<?php

memory_reset_peak_usage();
$start_time = microtime(true);

$raw = file_get_contents("./" . $inputFile);
// $data = str_replace("\n\n"," ",$raw);
$data = explode("\n", $raw);

$result = "";
display($data);

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

display($positions);

$count = 0;

foreach ($positions["X"] as $idxX => $coordsX) {
    $yX = $coordsX["y"];
    $xX = $coordsX["x"];
    $way = "";


    $validPos = [
        "up"           => ["y" => $yX - 1, "x" => $xX],     // up
        "down"         => ["y" => $yX + 1, "x" => $xX],     // down
        "left"         => ["y" => $yX, "x" => $xX - 1], // left
        "right"        => ["y" => $yX, "x" => $xX + 1], // right
        "top-left"     => ["y" => $yX - 1, "x" => $xX - 1], // 
        "top-right"    => ["y" => $yX - 1, "x" => $xX + 1], // top-right
        "bottom-left"  => ["y" => $yX + 1, "x" => $xX - 1], // bottom-left
        "bottom-right" => ["y" => $yX - 1, "x" => $xX + 1]  // bottom-right
    ];

    foreach ($validPos as $order => $pos) {
        $posY = $pos["y"];
        $posX = $pos["x"];

        if (isset($arr[$posY][$posX]) && $arr[$posY][$posX] === "M") {

            echo "X index : $idxX, order :$order =>  'X' en (" . $yX . ", " . $xX . ") et 'M' en (" . $posY . ", " . $posX . ") | \n";
            $way = $order;
        }
    }
    foreach ($positions["M"] as $idxM => $coordsM) {
        $yM = $coordsM["y"];
        $xM = $coordsM["x"];
    }
}



// display($arr);

echo "<pre>Execution time: ".round(microtime(true) - $start_time, 4)." seconds\n";
echo "Peak memory: ".round(memory_get_peak_usage()/pow(2, 20), 4), " MiB\n\n </pre>";