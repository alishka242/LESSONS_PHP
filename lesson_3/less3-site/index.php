<?php
define('TEMPLATES_DIR', 'templates/');
define('LAYOUTS_DIR', 'layouts/');

$page = 'index';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$params = [
    'name' => 'Админ'
];

function renderMenu($menu)
{
    foreach ($menu as $keyMenu => $valueMenu) {

        switch ($keyMenu) {
            case "Главная":
                $hrefMenu = "";
                break;
            case "Каталог":
                $hrefMenu = "?page=catalog";
                break;
            case "О нас":
                $hrefMenu = "?page=about";
                break;
        }
        
        echo "<ul style='display: flex;'>
                <li style=' width: 80px;'><a style='text-decoration: none; color: cadetblue;' href='/$hrefMenu'>$keyMenu</a></li><ul>";
        foreach ($valueMenu as $key => $value) {
            echo "
                <li style='display: inline; border-bottom: 1px solid lightgray; margin-right: 10px; color: gray'>$value</li>
            ";
        }
        echo "</ul></ul>";
    }
}

include "templates/params.php";

function getCatalog()
{
    return [
        [
            'name' => 'Пицца',
            'price' => 24
        ],
        [
            'name' => 'Чай',
            'price' => 1
        ],
        [
            'name' => 'Яблоко',
            'price' => 12
        ],
    ];
}

function render($page, $params = [])
{
    return renderTemplate(LAYOUTS_DIR . 'main', [
        'menu' => renderTemplate('menu', $params),
        'content' => renderTemplate($page, $params)
    ]);
}

echo render($page, $params);

function renderTemplate($page, $params = [])
{
    extract($params); // эта ф-ия делает то же, что и ф-ия foreach ниже
    // foreach ($params as $key => $value){
    //     $$key = $value; // $$ - значение ключа 
    // }

    ob_start();
    $fileName = TEMPLATES_DIR . $page . ".php";
    if (file_exists($fileName)) {
        include $fileName;
    }

    return ob_get_clean();
}