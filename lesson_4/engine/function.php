<?php 
function render($page, $params = [])
{
    return renderTemplate(LAYOUTS_DIR . 'main', [
        'header' => renderTemplate('header', $params),
        'menu' => renderTemplate('menu', $params),
        'content' => renderTemplate($page, $params),
        'footer' => renderTemplate('footer', $params),

    ]);
}

function renderTemplate($page, $params = [])
{
    extract($params);

    ob_start();
    $fileName = TEMPLATES_DIR . $page . ".php";
    if (file_exists($fileName)) {
        include $fileName;
    }

    return ob_get_clean();
}