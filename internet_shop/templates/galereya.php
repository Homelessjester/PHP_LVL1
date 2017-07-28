<?php
require './../engine/main.php';
require './../config/path_defines.php';
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
<form action="galereya.php" class="upload_form" id="upload_form" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Загрузить изображения в галерею</legend>
        <input type="hidden" name="MAX_FILE_SIZE" value="40000000">
        <input type="file" accept="image/*" multiple name="uploaded_file">
        <input type="submit" value="Загрузить">
    </fieldset>
</form>
<?php
print_r($_FILES);
?>
</body>
</html>
