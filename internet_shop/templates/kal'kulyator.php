<?php
require './../config/path_defines.php';
require ENGINE_DIR . 'main.php';
require ENGINE_DIR . 'database.php';

$first_number = $_GET['first_number'];
$second_number = $_GET['second_number'];
$operation = $_GET['operation'];

/**
 * Калькулятор
 * @param $first_number
 * @param $second_number
 * @param $operation
 * @return float|int|string
 */
function calculation($first_number, $second_number, $operation){
    if (empty($first_number) && empty($second_number) && empty($operation)){
        return ('Ошибка при получении данных');
    } elseif (!is_numeric($first_number) && !is_numeric($second_number)){
        return ('Введённые данные не являются числами');
    }

    switch ($operation){
        case '+':
            return $first_number + $second_number;
        case '-':
            return $first_number - $second_number;
        case '*':
            return $first_number * $second_number;
        case '/':
            if ($second_number === '0'){
                return ('На ноль делить нельзя');
            } else {
                return $first_number / $second_number;
            }
        default:
            return ('Неприемлемая математическая операция');
    }
}

include "calculation.phtml";
