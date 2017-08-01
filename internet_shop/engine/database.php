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

    echo "Соединение с MySQL установлено!" . PHP_EOL;
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

$my_link = db_connect('localhost', 'root', '', 'geekshop');

var_dump($my_link);

db_close($my_link);


