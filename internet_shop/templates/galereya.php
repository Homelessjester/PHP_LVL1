<?php
require_once './../config/path_defines.php';
require_once ENGINE_DIR . 'main.php';
require_once ENGINE_DIR . 'resize.php';
require_once ENGINE_DIR . 'gallery.php';
require_once ENGINE_DIR . 'database.php';

//TODO сделать страницы для отдельных фото
$my_link = db_connect('localhost', 'root', '', 'geekshop');

$images = get_images($images_dir);

var_dump($images);

db_close($my_link);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/styles/compiled/style.css">
    <script defer src="../public/js/slider.js"></script>
    <title>Галерея</title>
</head>
<body>

<a href="../public/index.php" class="navigation">На главную</a>
<form action="" class="upload_form" id="upload_form" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Загрузить изображения в галерею</legend>
        <input type="file" accept="image/*" multiple name="uploaded_file">
        <input type="submit" value="Загрузить">
    </fieldset>
</form>
<main class="gallery" id="gallery">
    <pre>
        <?php
        //TODO переделать функции ниже, что-бы они получали массив с изображениями из БД
        /*create_thumb(get_images($images_dir), $images_dir);
        echo generate_gallery(get_images($images_dir));*/

        ?>
    </pre>

</main>

<div class="button-group">
    <button class="button" onclick="choosePicture(false)">&#9664;</button>
    <button class="button" onclick="choosePicture(true)">&#9654;</button>
</div>

</body>
</html>
