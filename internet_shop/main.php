<?php
$h1 = 'Hi to all!';
$title = 'My first PHP page';
$current_year = date("Y");

/**
 * @param $array
 * @return bool|Error
 */
function create_menu ($array){
    if (!is_array($array)) return new Error('Value is not an array');

    foreach ($array as $item => $value){
        if (is_array($value)) {
            echo '<li><a href="#" title="' . $item . '">' . $item . '<ul>';
            create_menu($value);
            echo '</a></ul></li>';
        } else {
            echo '<li><a href="#" title="' . $value . '">' . $value . '</a></li>';
        }
    }
    return true;
}
