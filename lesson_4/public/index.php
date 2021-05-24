<?php
include "../config/config.php";

$page = 'index';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$params = [
    'name' => 'Админ'
];

function getMenu($menuArr)
{
    $output = "<ul>";

    foreach ($menuArr as $item) {
        $output .= "<li><a href=\"{$item["href"]}\">{$item["title"]}</a>";
        if (isset($item["subitems"])) {
            $output .= getMenu($item["subitems"]);
        }
        $output .= "</li>";
    }
    $output .= "</ul>";
    return $output;
};

function getGallery()
{
    $titleGal = '<h2>Галерея</h2><div>';
    $scanPhotoMin = scandir("img/small");
    $arrPhoto = [];
    $titleGal = "";

    foreach ($scanPhotoMin as $minPhoto) {

        if ($minPhoto !== '.' && $minPhoto !== '..') {
            $titleGal .= "<a href='img/big/{$minPhoto}'>
            <img src='img/small/{$minPhoto}' width='150' height='100'/>
            </a>";
            $arrPhoto[] = $titleGal;
        }
    }
    $titleGal .= "</div>";
    return $titleGal;
}

include "../templates/params.php";

// _log($params, 'params'); логика прописывается в файле log.php, а затем выводится в папке logs, которая появится сама
echo render($page, $params);
