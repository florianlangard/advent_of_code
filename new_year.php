<?php

$basePath = __DIR__;

if (!isset($_POST['year'])) {
    die("Aucune année fournie.");
}

$year = intval($_POST['year']);

if ($year < 2000 || $year > 2100) {
    die("Année invalide.");
}

$target = "$basePath/$year";

if (!is_dir($target)) {
    mkdir($target, 0777, true);
}

header("Location: /advent_of_code/index.php");
exit;
