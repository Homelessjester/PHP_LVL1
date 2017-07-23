<?php
$h1 = 'Hi to all!';
$title = 'My first PHP page';
$current_year = date("Y");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
</head>
<body>

<header>
    <!-- Nothing to do here -->
</header>

<main>
    <h1><?= $h1 ?></h1>
</main>

<aside>
    <!-- Nothing to do here -->
</aside>

<footer>
    <span>
        Copyright &copy; Denis Lomakin
        <?= $current_year ?>
    </span>
</footer>

</body>
</html>
