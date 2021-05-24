<?php
switch ($page) {
    case "index":
        break;
    case "catalog":
        $params['catalog'] = getCatalog();
        break;
    case "files":
        $params['files'] = array_splice(scandir('docs/'), 2);
        break;
    case "gallery":
        /*Если делать форму
            if($_POST[$_files]){
                upload(); - ф-тю писать в галлереи
                header();
            }
        */ 
        //$params['message'] = $messages[$_get['message]]; - сообщение об ошибке или положительном выполнении чего-то. писать в конфиге
        $params['gallery'] = getGallery();
        break;
    case "apicatalog":
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();
}
