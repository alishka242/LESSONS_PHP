<?php
require "db.php";
//посчитать просмотры
//$result = mysqli_query($db, "запрос на +1 к просмотру");
$result = mysqli_query($db, "SELECT * FROM news");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Новости:</h2>
    <?php foreach($result as $news):?>
        <div>
            <a href="news.php?id=<?=$news['id']?>"><?=$news['title']?></a>
            <p>Просмотрено: <?=$news['views']?> раз(а)</p>
        </div>
    <?endforeach;?>
</body>
</html>