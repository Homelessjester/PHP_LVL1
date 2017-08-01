<?php
$images_dir = UPLOAD_DIR . 'images';
$images_dir = str_ireplace('\\', '/', $images_dir);

move_uploaded_file($_FILES['up_file']['tmp_name'], $images_dir . $_FILES['up_file']['name']);

/**
 * Выборка файлов изображений
 * Дикая вложенность
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
                    if ((!is_dir($file)) && ($file != "." && $file != "..")) {
                        if (!empty(getimagesize($images_dir . '/' . $file))) {
                            array_push($images, [
                                'path' => PATH . $file,
                                'thumb_path' => THUMB_PATH . $file,
                                'size' => filesize($images_dir . '/' . $file)
                            ]);
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
        throw  new Error('File not exist');
    }
    return $images;
}

/**
 * Создание уменьшеных копий изображений
 * @param $images
 * @param $dir
 */
function create_thumb($images, $dir) {
    foreach ($images as $image) {
        if (!file_exists(THUMB_DIR . $image)) {
            create_thumbnail(
                $dir . '/' . $image,
                THUMB_DIR . '/' . $image,
                400,
                300
            );
        }
    }
}

/**
 * Генерация галереи
 * @param $array
 * @return string
 */
function generate_gallery($array){
    $result = '';
    foreach ($array as $image){
        $result .= "<a href='../data/upload/images/$image' target='_blank'><img src='../data/upload/thumb/$image' alt='Image' class='gallery_image' onerror=\"this.src = '../public/img/file-not-found/404.jpg'\"></a>";
    }
    return $result;
}