<?php

$basePath = __DIR__;
$templatePath = "$basePath/template";

if (!isset($_POST['year']) || !isset($_POST['day'])) {
    die("Paramètres manquants.");
}

$year = intval($_POST['year']);
$day = intval($_POST['day']);

if ($day < 1 || $day > 25) {
    die("Jour invalide (1-25).");
}

$yearPath = "$basePath/$year";
$dayFolder = "day$day";
$target = "$yearPath/$dayFolder";

if (!is_dir($yearPath)) {
    mkdir($yearPath, 0777, true);
}

function copyRecursive($src, $dst) {
    mkdir($dst, 0777, true);
    chmod($dst, 0755);
    $dir = opendir($src);
    while (($file = readdir($dir)) !== false) {
        if ($file === '.' || $file === '..') continue;

        $srcPath = "$src/$file";
        $dstPath = "$dst/$file";

        if (is_dir($srcPath)) {
            copyRecursive($srcPath, $dstPath);
        } else {
            copy($srcPath, $dstPath);
            chmod($dstPath, 0755);
        }
    }
    closedir($dir);
}

chmod($target, 0755);

copyRecursive($templatePath, $target);

header("Location: /advent_of_code/index.php");
exit;
