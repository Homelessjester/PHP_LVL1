<?php
require './../config/path_defines.php';
require ENGINE_DIR . 'main.php';
require ENGINE_DIR . 'database.php';

$id = (int) $_GET['id'];
$name = $_GET['name'];
$short_description = $_GET['short_description'];
$description = $_GET['description'];
$price = (float) $_GET['price'];
$category = $_GET['category'];
$image = $_GET['image'];
$path = $_GET['path'];
$size = (int) $_GET['size'];
$views = (int) $_GET['views'];
$thumb_path = $_GET['thumb_path'];

$my_link = db_connect('localhost', 'root', '', 'geekshop');

$sql = "UPDATE `images` SET `views` = `views` + 1 WHERE `id` = " . $id . ";";
execute_query($sql, $my_link);

include "single_product.phtml";
