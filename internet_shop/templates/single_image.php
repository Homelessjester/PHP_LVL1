<?php
require_once './../config/path_defines.php';
require_once ENGINE_DIR . 'main.php';
require_once ENGINE_DIR . 'resize.php';
require_once ENGINE_DIR . 'gallery.php';
require_once ENGINE_DIR . 'database.php';

$id = (int)$_GET['id'];
$path = $_GET['path'];
$views = (int)$_GET['views'];

$my_link = db_connect('localhost', 'root', '', 'geekshop');

$sql = "UPDATE `images` SET `views` = `views` + 1 WHERE `id` = " . $id . ";";
execute_query($sql, $my_link);

if ($_SERVER['REQUEST_METHOD'] == 'POST'
    && isset($_POST['comment'])
    && !empty(trim($_POST['comment']))) {

    $comment = escapeString(trim($_POST['comment']), $my_link);

    $comment = htmlspecialchars($comment);

    $sql = "INSERT INTO `comments` (`comment`, `image_id`) VALUES ('{$comment}', '{$id}');";
    execute_query($sql, $my_link);
}

$comments = [];

$sql = "SELECT `comment` FROM `comments` WHERE `image_id` = '{$id}'";
$res = get_assoc_result($sql, $my_link);
if(count($res) > 0) {
    $comments = $res;
}

include "single_image.phtml";

db_close($my_link);
