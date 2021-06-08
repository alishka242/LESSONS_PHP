<?php
function prepareVariables($page, $uriLevel_2 = "", $uriLevel_3 = "")
{
    switch ($page) {
        case "sing_in":
            $params['message'] = sing_in();
            break;

        case "registration":
            $params['message'] = reg();
            break;

        case "logout":
            logout();
            break;

        case "catalog":
            $params['catalog'] = getCatalog();
            break;

        case "product":
            $params['product'] = getProduct((int) $uriLevel_2);
            break;

        case "buy":
            addProduct((int) $uriLevel_2);
            break;

        case "basket":
            $params['basketProducts'] = getAllProducts($uriLevel_2, $uriLevel_3);
            $params['sum'] = getSum();
            break;

        case "placeorder":
            checkProfile();
            break;

        case "files":
            $params['files'] = array_splice(scandir('docs/'), 2);
            break;

        case "gallery":
            $params['gallery'] = getGallery();
            break;

        case "image":
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
            //json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
            die();
    }
    $params['name'] = is_auth();
    $params['allow'] = returnAllow();
    return $params;
}
