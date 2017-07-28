<?php
require './../engine/main.php';
require './../config/path_defines.php';

$images_dir = UPLOAD_DIR . 'images/';
$images_dir = str_ireplace('\\', '/', $images_dir);

move_uploaded_file($_FILES['up_file']['tmp_name'], $images_dir . $_FILES['up_file']['name']);

/**
 * Выборка файлов изображений
 * @param $images_dir
 * @return array
 * @throws Error
 */
function get_images($images_dir){
    $images = [];
    if (file_exists($images_dir)){
        if (is_dir($images_dir)){
            if ($dh = opendir($images_dir)) {
                while (false !== ($file = readdir($dh))) {
                    if ($file != "." && $file != "..") {
                        if (!empty(getimagesize($images_dir . '\\' . $file))) {
                            array_push($images, $file);
                        }
                    }
                }
                closedir($dh);
            } else {
                throw new Error('Error opening file');
            }
        } else {
            throw new Error('Error opening directory');
        }
    } else {
        echo 'File not exist';
    }
    return $images;
}

/**
 * @param $array
 */
function generate_gallery($array){
    foreach ($array as $image){
        echo "<img src='../data/upload/images/$image' alt='Image' class='gallery_image' onerror=\"this.src = '../public/img/file-not-found/404.jpg'\">";
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/styles/compiled/style.css">
    <title>Галерея</title>
</head>
<body>
<a href="template.php" class="navigation">На главную</a>
<form action="" class="upload_form" id="upload_form" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Загрузить изображения в галерею</legend>
        <input type="hidden" name="MAX_FILE_SIZE" value="40000000">
        <input type="file" accept="image/*" multiple name="uploaded_file">
        <input type="submit" value="Загрузить">
        <script defer src="../public/js/slider.js"></script>
    </fieldset>
</form>
<main class="gallery" id="gallery">
<?=generate_gallery(get_images($images_dir)) ?>
</main>

<div class="button-group">
    <button class="button" onclick="choosePicture(false)">&#9664;</button>
    <button class="button" onclick="choosePicture(true)">&#9654;</button>
</div>

</body>
</html>
