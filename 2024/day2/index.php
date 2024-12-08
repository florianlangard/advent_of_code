<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars(basename(dirname(__DIR__)) . " - " . basename(__DIR__))?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Doto:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="container">
        <div id="title-container">
            <h1>Advent of code <?= htmlspecialchars(basename(dirname(__DIR__)) . " - " . basename(__DIR__))?></h1>
        </div>
        <div id="content-container">
            <div id="part1">
                <h2 class="title">Part 1</h2>
                <div id="part1-text"><?php include('part1.php');?></div>
            </div>
            <div id="part2">
                <h2 class="title">Part 2</h2>
                <div id="part2-text"><?php include('part2.php');?></div>
            </div>
        </div>
    </div>
</body>
</html>