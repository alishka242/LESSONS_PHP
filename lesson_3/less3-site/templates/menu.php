<?php


$menu = [
    [
        "title" => "Главная",
        "href" => "/"   
    ], 
    [
        "title" => "Каталог",
        "href" => "?page=catalog",
        "subitems" => [
            [
                "title" => "Одежда",
                "href" => "#",
                "subitems" => [
                    [
                        "title" => "Повседневная",
                        "href" => "#",
                    ],
                    [
                        "title" => "Пляжная",
                        "href" => "#",
                    ]
                ]
            ],
            [
                "title" => "Обувь",
                "href" => "#"
            ],
            [
                "title" => "Сад",
                "href" => "#"
            ]
        ] 
    ],
    [
        "title" => "О нас",
        "href" => "?page=about"   
    ],
]; 

function getMenu($menuArr){
    $output = "<ul>";

    foreach($menuArr as $item){
        $output .= "<li><a href=\"{$item["href"]}\">{$item["title"]}</a>";
        if(isset($item["subitems"])){
            $output .= getMenu($item["subitems"]);
        }
        $output .= "</li>";
    }
    $output .= "</ul>";
    return $output;
};

echo getMenu($menu);