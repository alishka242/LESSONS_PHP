<?php


$menu = [
    [
        "title" => "Главная",
        "href" => "/"   
    ], 
    [
        "title" => "Каталог",
        "href" => "/catalog",
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
        "href" => "/about"   
    ],
    [
        "title" => "Файлы",
        "href" => "/files"   
    ],
    [
        "title" => "Галерея",
        "href" => "/gallery"   
    ],
    [
        "title" => "Новости",
        "href" => "/news"   
    ],
]; 

echo getMenu($menu);