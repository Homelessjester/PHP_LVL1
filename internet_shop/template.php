<?php
include_once './main.php';
$menu = ['Главная',
    'Категории' => [
        'Одежда',
        'Обувь'],
    'Галерея',
    'Контакты'];

$transliteration = [
    'а'=>'a', 'б'=>'b', 'в'=>'v', 'г'=>'g', 'д'=>'d', 'е'=>'e', 'ё'=>'yo', 'ж'=>'zh', 'з'=>'z', 'и'=>'i', 'й'=>'yi',
    'к'=>'k', 'л'=>'l', 'м'=>'m', 'н'=>'n', 'о'=>'o', 'п'=>'p', 'р'=>'r', 'с'=>'s', 'т'=>'t', 'у'=>'u', 'ф'=>'f',
    'х'=>'h', 'ц'=>'c', 'ч'=>'ch', 'ш'=>'sh', 'щ'=>'sh\'', 'ъ'=>'', 'ы'=>'i', 'ь'=>'\'', 'э'=>'e', 'ю'=>'yu', 'я'=>'ya',
    ' ' => '_',
];
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
            <?= create_menu($menu, get_transliteration_array($transliteration)); ?>
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
