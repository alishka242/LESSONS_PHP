<?php
function renderTemplate($page, $menu = "", $content = "")
{ 
    ob_start();
    include $page . ".php";
    return ob_get_clean();
};

$menu = renderTemplate('templates\menu');
$main = renderTemplate('templates\main');
$about = renderTemplate('templates\about');

echo renderTemplate("templates\layout", $menu, $about);

/*Вместо $about можо подставить $main. Я сделала ссылку на страничку о нас активной,
но вывести меню на страницу templates\about.php у меня не получилось.*/