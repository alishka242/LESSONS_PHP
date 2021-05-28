<?php
require "db.php";
//посчитать просмотры
//$result = mysqli_query($db, "запрос на +1 к просмотру");

$message = "";

if ($_GET['action'] == 'delete') {

    $id = (int) $_GET['id'];

    $result = mysqli_query($db, "DELETE FROM news WHERE id = {$id}");
    // mysqli_affected_row($result); - покажет сколько было задействовано строк (должна быть 1)
    $message = "Новость удалена";
    header("Location: ?message={$message}");
    die();
}

$message = strip_tags($_GET['message']);

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
    <p><?=$message?></p>
    <?php foreach($result as $news):?>
        <div>
            <a href="news.php?id=<?=$news['id']?>"><?=$news['title']?></a>
            <a href="?action=delete&id=<?=$news['id']?>">[X]</a>
            <!-- <p>Просмотрено: <?=$news['views']?> раз(а)</p> -->
        </div>
    <?endforeach;?>
</body>

</html>