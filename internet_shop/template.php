<?php
include_once './main.php';
$menu = ['Главная',
    'Категории' => [
        'Одежда',
        'Обувь'],
    'Контакты'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./styles/compiled/style.css">
    <title><?= $title ?></title>
</head>
<body>

<header>
    <nav>
        <menu class="navigation">
            <?= create_menu($menu); ?>
        </menu>
    </nav>
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
