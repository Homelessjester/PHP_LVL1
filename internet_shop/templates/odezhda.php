<?php
require './../config/path_defines.php';
require ENGINE_DIR . 'main.php';
require ENGINE_DIR . 'database.php';

$title = 'Одежда';

$my_link = db_connect('localhost', 'root', '', 'geekshop');

$sql = "SELECT DISTINCT * FROM 
`products` INNER JOIN `images` 
ON `products`.`image` = `images`.`id` 
AND `products`.`category` = 'pants';";
$products = get_assoc_result($sql, $my_link);

include "product.phtml";