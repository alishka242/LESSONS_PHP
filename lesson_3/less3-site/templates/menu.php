<?php


$menu = [
    "Главная" => [
        "Приветвие", "Популярные товары", "Связаться с нами"
    ], 
    "Каталог" => [
        "Пиццы", "Яблоки", "Чаи"
    ],
    "О нас" => [
        "Кто мы", "История", "Наши сотрудники" 
    ]
]; 
echo renderMenu($menu);