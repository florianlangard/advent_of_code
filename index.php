<?php

$basePath = __DIR__;

$entries = scandir($basePath);

$years = array_filter($entries, function($entry) use ($basePath) {
    return preg_match('/^\d{4}$/', $entry) && is_dir("$basePath/$entry");
});

rsort($years);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Doto:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Advent Of Code</title>
</head>
    <body>
        <h1 class="title"><a href="https://adventofcode.com/">Advent Of Code</a> Repository</h1>

        <form action="new_year.php" method="POST" id="add-year">
            <input type="number" name="year" min="2015" max="2100" required>
            <button type="submit"><i class="fa-solid fa-plus"></i> year</button>
        </form>
        
    <?php foreach ($years as $year): ?>
        <div class="sub-title-container">
            <h2 class="title"><?= htmlspecialchars($year) ?></h2>
            <form action="new_day.php" method="POST">
                <input type="hidden" name="year" value="<?= htmlspecialchars($year) ?>">
                <input type="number" name="day" min="1" max="24" required id="day-<?= $year ?>">
                <button type="submit"><i class="fa-solid fa-plus"></i> day</button>
            </form>
        </div>
            <?php
            $yearPath = "$basePath/$year";
            $days = scandir($yearPath);

            $dayFolders = array_filter($days, function($d) use ($yearPath) {
                return preg_match('/^day\d+$/', $d) && is_dir("$yearPath/$d");
            });

            sort($dayFolders);
            ?>

        <div class="link-container">
            <?php foreach ($dayFolders as $day): ?>
                <a href="<?= htmlspecialchars("$year/$day/index.php") ?>">
                    <div class="link">
                        <?= htmlspecialchars($day) ?>
                    </div>
                    </a>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
    </body>
</html>