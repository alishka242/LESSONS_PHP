<?php

function getGallery()
{
    return getAssocResult("SELECT * FROM images ORDER BY likes DESC");
}

function plusLike(int $id)
{   
    return executeQuery("UPDATE images SET likes = likes + 1 WHERE id = {$id}");
}

function getPhoto(int $id)
{
    return getOneResult("SELECT * FROM images WHERE id = {$id}");
}

function addPhotoInDb($fileName){
    executeQuery("INSERT INTO images (name) VALUES ('{$fileName}')");
}

function loadImg()
{   
    $path_big = IMG_BIG . $_FILES["img"]["name"];
    $path_small = IMG_SMALL . $_FILES["img"]["name"];

    //Проверка на тип файла
    $imageinfo = getimagesize($_FILES["img"]["tmp_name"]);
    if ($imageinfo['mime'] != 'image/jpg' && $imageinfo['mime'] != 'image/jpeg' &&$imageinfo['mime'] != 'image/png' && $imageinfo['mime'] != 'image/gif') {
        echo "Можно загружать только jpg, gif или png файлы.";
        exit;
    }

    //Проверка на размер файла
    if ($_FILES["images"]["size"] > 1024 * 5 * 1024) {
        echo "Размер файла больше 5 мб";
        exit;
    }

    //Проверка расширения файла
    $blacklist = [".php", ".phtml", ".php3", ".php4"];
    foreach ($blacklist as $item) {
        if (preg_match("/$item\$/i", $_FILES['img']['name'])) {
            echo "Загрузка php-файлов запрещена";
            exit;
        }
    }

    if (move_uploaded_file($_FILES["img"]["tmp_name"], $path_big)){

        //Ресайз
        $img = new SimpleImage();
        $img->load($path_big);
        $img->resizeToWidth(150);
        $img->save($path_small);
        addPhotoInDb($_FILES["img"]['name']);
        } else {
        echo "Ошибка";
    }
    header("Location: /gallery");
}