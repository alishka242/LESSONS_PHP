<?php
//Файл с функциями нашего движка
//CONTROLLER

function prepareVariables($page, $uriLevel_2 = "", $uriLevel_3 = "")
{
    switch ($page) {
        case "index":
            $params['name'] = 'Админ';
            break;

        case "catalog":
            $params['catalog'] = getCatalog();
            break;

        case "product":
            $id = (int) $uriLevel_2;
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
            if (plusLike((int) $uriLevel_2)) {
                $params['message'] = "Такого изображения нет";
            }

            $params['image'] = getPhoto((int) $uriLevel_2);
            break;

        case "news":
            $params['news'] = getNews();
            break;

        case "newsone":
            $params['news'] = getOneNews((int) $uriLevel_2);
            break;

        case "comments":
            $params['action'] = getCommentAction($uriLevel_2, $uriLevel_3);
            $params['comments'] = getAllComments();
            break;

        case "apicatalog":
            echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
            die();
    }
    return $params;
}
