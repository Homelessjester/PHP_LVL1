<?php

if (!defined('ROOT_DIR')) {
    define('ROOT_DIR', realpath(__DIR__ . '/../'));
}

if (!defined('PUBLIC_DIR')) {
    define('PUBLIC_DIR', ROOT_DIR . '/public/');
}

if (!defined('ENGINE_DIR')) {
    define('ENGINE_DIR', ROOT_DIR . '/engine/');
}

if (!defined('CONFIG_DIR')) {
    define('CONFIG_DIR', ROOT_DIR . '/config/');
}

if (!defined('DATA_DIR')) {
    define('DATA_DIR', ROOT_DIR . '/data/');
}

if (!defined('UPLOAD_DIR')) {
    define('UPLOAD_DIR', DATA_DIR . '/upload/');
}

if (!defined('TEMPLATE_DIR')) {
    define('TEMPLATE_DIR', ROOT_DIR . '/templates/');
}

if (!defined('STYLE_DIR')) {
    define('STYLE_DIR', PUBLIC_DIR . 'styles/compiled/');
}


