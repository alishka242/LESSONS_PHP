<?php
$page = 'index';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$params = [
    'name' => 'Админ'
];

include "../config/config.php";

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

include "../templates/params.php";

// _log($params, 'params'); логика прописывается в файле log.php, а затем выводится в папке logs, которая появится сама
echo render($page, $params);