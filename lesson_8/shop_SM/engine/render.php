<?php
function render($page, $params)
{
    return renderTemplate(LAYOUTS_DIR . 'main', [
        'header' => renderTemplate('header', $params),
        'menu' => renderTemplate('menu', $params),
        'content' => renderTemplate($page, $params),
        'footer' => renderTemplate('footer', $params),
    ]);
}

function renderTemplate($page, $params)
{
    ob_start();

    if (!is_null($params)) {
        extract($params);
    }

    $fileName = TEMPLATES_DIR . $page . ".php";

    if (file_exists($fileName)) {
        include $fileName;
    }

    return ob_get_clean();
}

function renderMenu($menuArr)
{
    // $user = is_auth();
    // if ($user == "admin") {
    //     $menuArr = array_push(["title" => "Админка", "href" => "/admin"]);
    // } else {
    //     unset($menuArr[["title" => "Админка", "href" => "/admin"]]);
    // }
    $output = "<ul>";

    foreach ($menuArr as $item) {
        $output .= "<li><a href=\"{$item["href"]}\">{$item["title"]}</a>";
        if (isset($item["subitems"])) {
            $output .= renderMenu($item["subitems"]);
        }
        $output .= "</li>";
    }
    $output .= "</ul>";
    return $output;
};