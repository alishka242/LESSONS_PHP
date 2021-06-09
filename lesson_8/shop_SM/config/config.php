<?php
define("ROOT", dirname(__DIR__));
define('IMG_SMALL', $_SERVER['DOCUMENT_ROOT'] . '/img/small/');
define('IMG_BIG', $_SERVER['DOCUMENT_ROOT'] . '/img/big/');
define('TEMPLATES_DIR', ROOT . '/templates/');
// define('ENGINE_DIR', ROOT . '/engine/');
define('LAYOUTS_DIR', 'layouts/');
define('URL_ARRAY', explode('/', $_SERVER['REQUEST_URI']));

// DB config
define('HOST','localhost:3306');
define('USER','root');
define('PASS','Not.8fat');
define('DB','shop_SM');

$messages = [
    'OK' => 'Сообщение добавлено',
    'DELETE' => 'Сообщение удалено',
    'EDIT' => 'Сообщение изменено',
    'ERROR' => 'Ошибка'
];

// include ROOT . "/engine/lib_autoload.php";
include ROOT . "/engine/db.php";
include ROOT . "/engine/controller.php";
include ROOT . "/engine/render.php"; 
include ROOT . "/engine/auth.php"; 
include ROOT . "/engine/news.php"; 
include ROOT . "/engine/catalog.php"; 
include ROOT . "/engine/product.php"; 
include ROOT . "/engine/log.php"; 
include ROOT . "/engine/gallery.php";
include ROOT . "/engine/comments.php"; 
include ROOT . "/engine/basket.php"; 
include ROOT . "/engine/registration.php"; 
include ROOT . "/engine/classSimpleImage.php";