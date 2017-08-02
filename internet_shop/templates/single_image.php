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

if (!$my_link){
    die('Ошибка соединения: ' . mysqli_connect_errno());
}

$sql = "UPDATE `images` SET `views` = " . ++$views . " WHERE `id` = " . $id . ";";
if (!checking_connection($my_link, $sql)){
    die('Ошибка: ' . mysqli_error($my_link));
} else {
    mysqli_query($my_link, $sql);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image</title>
    <link rel="stylesheet" href="../public/styles/compiled/style.css">
</head>
<body>
<header>

</header>

<aside>

</aside>

<main class="gallery">
    <img src="<?=$path;?>" alt="Image">
</main>

<footer>
    <span>
        Copyright &copy; Denis Lomakin
        <?= $current_year ?>
    </span>
</footer>

</body>
</html>
<?php
db_close($my_link);
?>
