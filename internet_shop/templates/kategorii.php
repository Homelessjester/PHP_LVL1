<?php
require './../config/path_defines.php';
require './../engine/main.php';

$array = get_array_for_menu();

foreach ($array as $item=>$value){
    if (is_array($value) && strstr(__FILE__, string_transliteration($item, get_transliteration_array()))){
        $result = create_menu($value, get_transliteration_array());
    }
}
