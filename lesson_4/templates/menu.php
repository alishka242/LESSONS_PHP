<?php


$menu = [
    [
        "title" => "Главная",
        "href" => "/"   
    ], 
    [
        "title" => "Каталог",
        "href" => "?page=catalog",
        // "subitems" => [
        //     [
        //         "title" => "Одежда",
        //         "href" => "#",
        //     ],
        //     [
        //         "title" => "Обувь",
        //         "href" => "#"
        //     ],
        //     [
        //         "title" => "Сад",
        //         "href" => "#"
        //     ]
        // ] 
    ],
    [
        "title" => "О нас",
        "href" => "?page=about"   
    ],
    [
        "title" => "Файлы",
        "href" => "?page=files"   
    ],
    [
        "title" => "Галерея",
        "href" => "?page=gallery"   
    ],
]; 

echo getMenu($menu);