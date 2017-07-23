<?php
echo '<h1>Задание №1</h1>';
$a = -11;
$b = -5;

/**
 * @param $a
 * @param $b
 * @return int|Error
 */
function first_exercise($a, $b) {
    if ($a > 0 && $b > 0) {
        return $a - $b;
    } elseif ($a < 0 && $b < 0) {
        return $a * $b;
    } elseif (($a > 0) ^ ($b > 0)) {
        return $a + $b;
    } else {
        return new Error('Unexpected error');
    }
}

echo first_exercise($a, $b).'<br>';

echo '<h1>Задание №3</h1>';
/**
 * @param $a
 * @param $b
 * @return mixed
 */
function addition($a, $b){
    return $a + $b;
}

/**
 * @param $a
 * @param $b
 * @return mixed
 */
function subtraction($a, $b){
    return $a - $b;
}

/**
 * @param $a
 * @param $b
 * @return mixed
 */
function multiplication($a, $b){
    return $a * $b;
}

/**
 * @param $a
 * @param $b
 * @return float|int
 */
function division($a, $b){
    return $a / $b;
}

echo addition(8,5).'<br>';
echo subtraction(8,5).'<br>';
echo multiplication(8,5).'<br>';
echo division(8,5).'<br>';

echo '<h1>Задание №4</h1>';
/**
 * @param $arg1
 * @param $arg2
 * @param $operation
 * @return Error|float|int
 */
function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case '+':
            return $arg1 + $arg2;
            break;
        case '-':
            return $arg1 - $arg2;
            break;
        case '*':
            return $arg1 * $arg2;
            break;
        case '/':
            return $arg1 / $arg2;
            break;
        default:
            return new Error('Unexpected error');
    }
}

echo mathOperation(2, 5, '*').'<br>';

echo '<h1>Задание №6</h1>';
/**
 * @param $val
 * @param $pow
 * @return Error|float|int
 */
function power($val, $pow){
    if ($pow === 0) return 1;
    if ($pow === 1) return $val;
    if ($pow > 1) return $val * power($val, --$pow);
    if ($pow < 0) {
        return 1/power($val, abs($pow));
    }
    return new Error('Unexpected Error');
}

echo power(10,-1).'<br>';

echo '<h1>Задание №7</h1>';
/**
 * @param $time
 * @return string
 */
function current_time($time){
    $time = explode(':', $time);
    $hours = $time[0];
    $minutes = $time[1];
    if ($hours == 0 || ($hours >= 5 && $hours <= 20)):
        $hours_ending = 'ов';
    elseif (($hours >= 2 && $hours <=4) || ($hours >= 22 && $hours <=24)):
        $hours_ending = 'а';
    else: $hours_ending = '';
    endif;
    if (($minutes[1] > 1 && $minutes[1] < 5) && !($minutes > 4 && $minutes < 21)):
        $minutes_ending = 'ы';
    elseif (($minutes[1] == 1) && ($minutes != 11)):
        $minutes_ending = 'а';
    else: $minutes_ending = '';
    endif;
    return 'Текущее время: ' . $hours . ' час' . $hours_ending . ' ' . $minutes . ' минут' . $minutes_ending;
}

echo current_time(date('H:i')).'<br>';
