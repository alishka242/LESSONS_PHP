<?php
	$h1 = 'Информация обо мне';
	$title = 'Главная страница - страница обо мне';
	$year_now = date("Y");
	$picture = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSdRr4MgZFBYUSWzhIR5ACAG5GBsMLOmhtcQp0pCk5JodNZ_gWI9UUbEi2Adh3IgQBPBWM&usqp=CAU";

	$content = file_get_contents("main.html");
	$content = str_replace("{{ H1 }}", $h1, $content);

	$content = str_replace("{{ TITLE }}", $title, $content);

	$content = str_replace("{{ YEAR }}", $year_now, $content);

	$content = str_replace("{{ PICTURE }}", $picture, $content);

	echo $content;
?> 