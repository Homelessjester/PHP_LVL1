<?php
//TODO раскомментировать файл
//Задание №1
/*const EX1 = 100;
$i = 2;

while ($i <= EX1) {
    if ($i % 3 === 0) echo $i . '<br>';
    $i++;
}*/

//Задание №2
/*const EX2 = 10;
$i = 0;
echo $i . ' - это ноль<br>';

do {
    $i++;
    if ($i % 2) {
        echo $i . ' - это нечётное число<br>';
    } else {
        echo $i . ' - это чётное число<br>';
    }
} while ($i <= 9);*/

//Задание №3
/*$country = [
    'Республика Крым' => [
        'Феодосия', 'Судак', 'Ялта', 'Симферополь', 'Керчь', 'Алушта', 'Евпатория',
    ],
    'Московская область' => [
        'Москва', 'Зеленоград', 'Клин'
    ],
];

foreach ($country as $item => $value) {
    echo '<b>' . $item . '</b><br>';
    echo implode(', ', $value) . '<br>';
}*/

//Задание №4
$transliteration = [
    'a'=>'a', 'б'=>'b', 'в'=>'v', 'г'=>'g', 'д'=>'d', 'е'=>'e', 'ё'=>'yo', 'ж'=>'zh', 'з'=>'z', 'и'=>'i', 'й'=>'yi',
    'к'=>'k', 'л'=>'l', 'м'=>'m', 'н'=>'n', 'о'=>'o', 'п'=>'p', 'р'=>'r', 'с'=>'s', 'т'=>'t', 'у'=>'u', 'ф'=>'f',
    'х'=>'h', 'ц'=>'c', 'ч'=>'ch', 'ш'=>'sh', 'щ'=>'sh\'', 'ъ'=>'', 'ы'=>'i', 'ь'=>'\'', 'э'=>'e', 'ю'=>'yu', 'я'=>'ya',
];

foreach ($transliteration as $item => $value) {
    $transliteration[mb_strtoupper($item)] = mb_strtoupper($value);
}



function string_transliteration($str, $array){
    foreach ($array as $item => $value) {
        for ($i = 0; $i < mb_strlen($str) * 2; $i++) {

        }
    }

}

echo string_transliteration('Привет', $transliteration).'<br>';
