<?php

$raw = file_get_contents('./sample.txt');
// $data = str_replace("\n\n"," ",$raw);
$data = explode("\n", $raw);

$result = "";

//==== Part two ===============================




echo "<pre>";
print_r($result);
echo "</pre>";