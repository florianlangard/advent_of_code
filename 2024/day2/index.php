<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= "AoC " . htmlspecialchars(basename(dirname(__DIR__)) . " - " . basename(__DIR__))?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Doto:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/advent_of_code/style.css">
</head>
<body>

    <?php include('../../helpers.php')?>

    <?php
        $year = htmlspecialchars(basename(dirname(__DIR__)));
        $day = basename(__DIR__);
        preg_match('/day(\d+)/', $day, $m);
        $nbDay = (int)$m[1];

        $isSample = !isset($_GET['data']);
        $inputFile = $isSample ? 'sample.txt' : 'data.txt';

        $toggleUrl = $isSample ? '?data=1' : '?';
        $currentSource = $isSample ? '[sample.txt]' : '[data.txt]';
        $toggleLabel = $isSample ? 'Switch to [data.txt]' : 'Switch to [sample.txt]';
    ?>
    
    <div id="container">
        <div id="title-container">
            <h1 class="title"><a href="/advent_of_code">Advent of code</a> <?= $year . " - " . $day ?></h1>
            <a class="subtitle" href=<?="https://adventofcode.com/". $year ."/day/". $nbDay; ?>>link to challenge <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
        <div class="toggle-source"><?= "current source= " . $currentSource; ?><br><a href=<?= $toggleUrl; ?>><?= $toggleLabel ?></a></div>
        <div id="content-container">
            <div id="part1">
                <h2 class="title">Part 1</h2>
                <div id="part1-text"><?php include('./part1.php');?></div>
            </div>
            <div id="part2">
                <h2 class="title">Part 2</h2>
                <div id="part2-text"><?php include('./part2.php');?></div>
            </div>
        </div>
    </div>
</body>
</html>