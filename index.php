<?php
//TODO: раскомментировать файл
//TODO: добавить PHPDoc к функциям
//Задание №1
const EX1 = 100;
$i = 2;

while ($i <= EX1) {
    if ($i % 3 === 0) echo $i . '<br>';
    $i++;
}

//Задание №2
const EX2 = 10;
$i = 0;
echo $i . ' - это ноль<br>';

do {
    $i++;
    if ($i % 2) {
        echo $i . ' - это нечётное число<br>';
    } else {
        echo $i . ' - это чётное число<br>';
    }
} while ($i <= 9);

//Задание №3, №8
$country = [
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
}

foreach ($country as $item => $value) {
    echo '<b>' . $item . '</b><br>';
    foreach ($value as $subitem => $city) {
        if (strstr($city, 'К')) {
            echo $city . '<br>';
        }
    }
}

//Задание №4
$transliteration = [
    'a'=>'a', 'б'=>'b', 'в'=>'v', 'г'=>'g', 'д'=>'d', 'е'=>'e', 'ё'=>'yo', 'ж'=>'zh', 'з'=>'z', 'и'=>'i', 'й'=>'yi',
    'к'=>'k', 'л'=>'l', 'м'=>'m', 'н'=>'n', 'о'=>'o', 'п'=>'p', 'р'=>'r', 'с'=>'s', 'т'=>'t', 'у'=>'u', 'ф'=>'f',
    'х'=>'h', 'ц'=>'c', 'ч'=>'ch', 'ш'=>'sh', 'щ'=>'sh\'', 'ъ'=>'', 'ы'=>'i', 'ь'=>'\'', 'э'=>'e', 'ю'=>'yu', 'я'=>'ya',
];

foreach ($transliteration as $item => $value) {
    $transliteration[mb_convert_case($item, MB_CASE_UPPER, 'UTF-8')] =
        mb_convert_case($value, MB_CASE_UPPER, 'UTF-8');
}

/**
 * @param $str
 * @param $array
 * @return string
 */
function string_transliteration($str, $array){
    $str_array = [];
    for ($i = 0; $i < strlen($str); $i += 2) {
        $str_array[$i/2] = $str[$i] . $str[$i + 1];
    }
    for ($i = 0; $i < strlen($str); $i++){
        foreach ($array as $item => $value) {
            if ($str_array[$i] === $item) $str_array[$i] = $value;
        }
    }
    return implode($str_array);
}

echo string_transliteration('Привет', $transliteration).'<br>';

//Задание №5
/**
 * @param $str
 * @return mixed
 */
function replace_space_to_subversion ($str) {
    $str = str_ireplace(' ', '_', $str);
    return $str;
}

echo replace_space_to_subversion('Hello, my beautiful world!');

//Задание №7
for ($i=0; $i < 10; print($i++.'<br>')) {/*nothing to do here...*/}



