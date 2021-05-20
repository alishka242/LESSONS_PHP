<?php
switch ($page) {
    case "index":
        break;
    case "catalog":
        $params['catalog'] = getCatalog();
        break;
    case "apicatalog":
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();
}