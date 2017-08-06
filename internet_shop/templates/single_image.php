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

include "single_image.phtml";

db_close($my_link);
