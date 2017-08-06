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
 * @return bool
 */
function add_to_db($array, $link){

    foreach ($array as $images){
        $sql = "SELECT `path` FROM `images` WHERE `path` = '" . $images['path'] . "';";
        if (!checking_connection($link)) {
            return NULL;
        }
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
    return true;
}

/**
 * Выборка данных из базы
 * @param $link
 * @return array|null
 */
function get_from_db($link){
    $sql = "SELECT * FROM `images` ORDER BY `views` DESC";
    $result = get_assoc_result($sql, $link);
    return $result;
}


/**
 * Проверка соединения с БД
 * @param $link
 * @param $sql
 * @return bool
 */
function checking_connection($link){
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        printf("Errorcode: %d\n", mysqli_errno($link));
        return false;
    }
    return true;
}

/**
 * Выполнить экранирование строки
 * @param $str
 * @param null $db
 * @return string
 */
function escapeString($str, $db = null) {

    $res = mysqli_real_escape_string($db, $str);

    mysqli_close($db);

    return $res;
}

/**
 * Отправка запроса в базу
 * @param $sql
 * @param $link
 * @return bool|mysqli_result|string
 */
function execute_query($sql, $link){
    if (!checking_connection($link)){
        $result = ('Ошибка: ' . mysqli_error($link));
    } else {
        $result = mysqli_query($link, $sql);
    }
    return $result;
}

/**
 * Получить результат в виде ассоциативного массива
 * @param $sql
 * @param $link
 * @return array|string
 */
function get_assoc_result($sql, $link){

    $result = execute_query($sql, $link);
    $array_result = [];

    if (is_string($result)){
        return $result;
    }

    while($row = mysqli_fetch_assoc($result)) {
        $array_result[] = $row;
    }
    return $array_result;
}




