<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars(basename(dirname(__DIR__)) . " - " . basename(__DIR__))?></title>
</head>
<body>
    <div><?php include('part1.php');?></div>
    <div><?php include('part2.php');?></div>
</body>
</html>