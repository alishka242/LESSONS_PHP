<?php 
//Файл с функциями нашего движка

function prepareVariables($page){
    switch ($page) {
        case "index":
            $params['name'] = 'Админ';
            break;
    
        case "catalog":
            $params['catalog'] = getCatalog();
            break;
    
        case "files":
            $params['files'] = array_splice(scandir('docs/'), 2);
            break;
    
        case "gallery":
            if (isset($_POST['load'])) {
                loadImg();
            }
            //$params['message'] = $messages[$_GET['message']]; // сообщение об ошибке или положительном выполнении чего-то. писать в конфиге
            $params['gallery'] = getGallery();
            break;
    
        case "image":
            if (plusLike($_GET['id'])) {
                $params['message'] = "Такого изображения нет";
            }
            $params['image'] = getPhoto($_GET['id']);

            break;  
    
        case "news":
            $params['news'] = getNews();
            break;
    
        case "newsone":
            $id = (int)$_GET['id'];
            $params['news'] = getOneNews($id);
            break;
    
        case "apicatalog":
            echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
            die();
    }
    return $params;
}


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

    if(!is_null($params)){
        extract($params);
    }
       
    $fileName = TEMPLATES_DIR . $page . ".php";
    
    if (file_exists($fileName)) {
        include $fileName;
    }

    return ob_get_clean();
}

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