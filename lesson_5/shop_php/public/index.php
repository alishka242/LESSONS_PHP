<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";

$url_array = explode('/', $_SERVER['REQUEST_URI']);

if ($url_array[1] == ""){
    $page = 'index';
} else {
    $page = $url_array[1];
}

$params = prepareVariables($page);

// _log($params, 'params'); логика прописывается в файле log.php, а затем выводится в папке logs, которая появится сама
echo render($page, $params);