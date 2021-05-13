<?php
    $a = 1;
    $b = 2;

    $a = $a + $b;
    $b = $a - $b;
    $a = $a - $b;
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
    <h2>Задача</h2>
    <p>Используя только две переменные, поменяйте их значение местами. <br> 
    Например, если a = 1, b = 2, надо, чтобы получилось b = 1, a = 2. <br>
    Дополнительные переменные использовать нельзя.</p>
    <h3>Решение на php:</h3>
    <p>
    a = a + b; <br>
    b = a - b; <br>
    a = a - b; <br><br>
    Расчет происходит в коде php
    </p>
    <h3>Ответ: a = <?= $a?>, b = <?= $b?></h3>
</body>
</html>