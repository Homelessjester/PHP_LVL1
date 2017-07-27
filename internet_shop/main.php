<?php
//TODO Создать папки проекта как в методичке
$h1 = 'Hi to all!';
$title = 'My first PHP page';
$current_year = date("Y");

/**
 * @param $array
 * @return mixed|Error
 */
function get_transliteration_array($array){
    if (!is_array($array)) return new Error('Value is not an array');
    foreach ($array as $item => $value) {
        $array[mb_convert_case($item, MB_CASE_UPPER, 'UTF-8')] =
            mb_convert_case($value, MB_CASE_UPPER, 'UTF-8');
    }
    return $array;
}

/**
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
 * @param $array
 * @param $array
 * @return Error
 */
function create_menu ($array, $transliteration_array){
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
}



