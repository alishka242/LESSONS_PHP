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
    [
        "title" => "Отзывы",
        "href" => "/comments"   
    ],
    [
        "title" => "Корзина",
        "href" => "/basket"   
    ],
]; 

echo renderMenu($menu);