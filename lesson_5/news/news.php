<?php
require "db.php";
$id = (int) $_GET['id'];
$result = mysqli_query($db, "SELECT * FROM news WHERE id = {$id}");
$news = mysqli_fetch_assoc($result);
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
        <div>
            <h3><?=$news['title']?></h3>
            <p><?=$news['text']?></p>
            <p>Просмотрено: <?=$news['views']?> раз(а)</p>
        </div>
</body>
</html>