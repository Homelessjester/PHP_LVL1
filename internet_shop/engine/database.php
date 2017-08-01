<?php

/**
 * Примитивная функция соединения с БД
 * @param string $host
 * @param string $user
 * @param string $password
 * @param string $database
 * @param string $port
 * @param string $socket
 * @return Error|mysqli
 */
function db_connect($host, $user, $password, $database,
                    $port = '3306',
                    $socket = 'mysqli.default_socket')
{
    $link = mysqli_connect($host, $user, $password, $database, $port, $socket);

    if (!$link) {
        return new Error(
            'Код ошибки errno: ' . mysqli_connect_errno() . PHP_EOL .
                    "\nТекст ошибки error: " . mysqli_connect_error() . PHP_EOL);
    }

    mysqli_set_charset($link, 'utf-8');
    return $link;
}

/**
 * Закрытие соединения с БД
 * @param $link
 * @return bool|Error
 */
function db_close($link){
    if (!mysqli_close($link)) {
        return new Error('Error');
    }
    return true;
}

/**
 * Проверяет и добавляет в базу при необходимости сведения о графическом файле
 * @param $array
 * @param $link
 * @return array|null
 */
function add_to_db($array, $link){

    foreach ($array as $images){
        $sql = "SELECT `path` FROM `images` WHERE `path` = '" . $images['path'] . "';";
        $result = mysqli_query($link, $sql);
        if ((count(mysqli_fetch_all($result, MYSQLI_ASSOC))) == 0) {
            $sql = "INSERT INTO `images`
                    (`path`, `thumb_path`, `size`)
                    VALUES ('{$images['path']}', '{$images['thumb_path']}', '{$images['size']}')";
            mysqli_query($link, $sql);
        } else {
            continue;
        }
    }
    $sql = "SELECT * FROM `images` ORDER BY `path` ASC;";
    return mysqli_fetch_all(mysqli_query($link, $sql), MYSQLI_ASSOC);
}



