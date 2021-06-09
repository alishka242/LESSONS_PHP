<?php
//ROUTER
include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";

if (URL_ARRAY[1] == ""){
    $page = 'welcome';
} else {
    $page = URL_ARRAY[1];
}

$uriLevel_2 = URL_ARRAY[2];
$uriLevel_3 = URL_ARRAY[3];

$params = prepareVariables($page, $uriLevel_2, $uriLevel_3);

// _log($params, 'params'); логика прописывается в файле log.php, а затем выводится в папке logs, которая появится сама
echo render($page, $params);