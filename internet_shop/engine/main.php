<?php
require './../config/path_defines.php';
$h1 = 'Hi to all!';
$title = 'My first PHP page';
$current_year = date("Y");


/**
 * Создние и дополнение массива транслитерации
 * @return mixed|Error
 */
function get_transliteration_array(){
    $transliteration = [
        'а'=>'a', 'б'=>'b', 'в'=>'v', 'г'=>'g', 'д'=>'d', 'е'=>'e', 'ё'=>'yo', 'ж'=>'zh', 'з'=>'z', 'и'=>'i', 'й'=>'yi',
        'к'=>'k', 'л'=>'l', 'м'=>'m', 'н'=>'n', 'о'=>'o', 'п'=>'p', 'р'=>'r', 'с'=>'s', 'т'=>'t', 'у'=>'u', 'ф'=>'f',
        'х'=>'h', 'ц'=>'c', 'ч'=>'ch', 'ш'=>'sh', 'щ'=>'sh\'', 'ъ'=>'', 'ы'=>'i', 'ь'=>'\'', 'э'=>'e', 'ю'=>'yu', 'я'=>'ya',
        ' ' => '_',
    ];
    if (!is_array($transliteration)) return new Error('Value is not an array');
    foreach ($transliteration as $item => $value) {
        $transliteration[mb_convert_case($item, MB_CASE_UPPER, 'UTF-8')] =
            mb_convert_case($value, MB_CASE_UPPER, 'UTF-8');
    }
    return $transliteration;
}

/**
 * Транслитерация строк для генерации имён файлов шаблонов
 * @param $str
 * @param $array
 * @return string|Error
 */
function string_transliteration($str, $array){
    if (!is_array($array)) return new Error('Value is not an array');
    $str_array = preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);

    $exit_array = [];

    for ($i = 0; $i < strlen($str); $i++){
        if (array_key_exists($str_array[$i], $array)) {
            $exit_array[] = $array[$str_array[$i]];
        } else {
            $exit_array[] = $str_array[$i];
        }
    }
    return strtolower(implode($exit_array));
}

/**
 * Создание меню, генерация ссылок и шаблонов
 * @param $array
 * @param $transliteration_array
 * @return Error
 */
function create_menu($array, $transliteration_array){
    if (!is_array($array)) return new Error('Value is not an array');

    foreach ($array as $item => $value){
        if (is_array($value)) {
            echo '<li>' . $item . '<ul>';
            create_menu($value, $transliteration_array);
            echo '</ul></li>';
        } else {
            echo '<li><a href="./' . string_transliteration($value, $transliteration_array) . '.php" title="' . $value . '">' . $value . '</a></li>';
        }
    }
    create_templates($array);
}

/**
 * Функция для передачи другим функциям массива - основы для меню
 * @return array
 */
function get_array_for_menu(){
    return ['Главная',
        'Категории' => [
            'Одежда',
            'Обувь'],
        'Галерея',
        'Контакты'];
}

/**
 * Генерации шаблонов для главных разделов сайта
 * @param $array
 * @return Error
 */
function create_templates($array){
    if (!is_array($array)) return new Error('Value is not an array');

    foreach ($array as $item => $value) {
        if (!is_array($value)) {
            $file =  TEMPLATE_DIR . string_transliteration($value, get_transliteration_array()) . '.php';
        } else {
            $file =  TEMPLATE_DIR . string_transliteration($item, get_transliteration_array()) . '.php';
        }
        if (!file_exists($file)) {
            file_put_contents($file, '<?php
require \'./../engine/main.php\';
require \'./../config/path_defines.php\';');
        }
    }
}


