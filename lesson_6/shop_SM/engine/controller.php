<?php
//Файл с функциями нашего движка
//CONTROLLER

function prepareVariables($page)
{
    switch ($page) {
        case "index":
            $params['name'] = 'Админ';
            break;

        case "catalog":
            $params['catalog'] = getCatalog();
            break;

        case "product":
            $id = (int)$_GET['id'];
            $params['product'] = getProduct($id);
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

        case "comments":
            $params['comments'] = getComments();
            break;

        case "commentsadd":
            $params['comments'] = addComment();
            break;

        case "apicatalog":
            echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
            die();
    }
    return $params;
}
