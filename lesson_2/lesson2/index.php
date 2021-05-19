<?php
// Задание 1
$text1 = "Объявить две целочисленные переменные \$a и \$b и задать им произвольные начальные значения.
Затем написать скрипт, который работает по следующему принципу:";
$text1_2 = "если \$a и \$b положительные, вывести их разность;
<br>если \$а и \$b отрицательные, вывести их произведение;
<br>если \$а и \$b разных знаков, вывести их сумму;";

$a = random_int(-20, 20);
$b = random_int(-20, 20);
$c = null;
if ($a >= 0 && $b >= 0) {
    $c = $a - $b;
} elseif ($a < 0 && $b < 0) {
    $c = $a * $b;
} elseif ($a >= 0 && $b < 0 || $a < 0 && $b >= 0) {
    $c = $a + $b;
} else {
    $c = 'Переменные равны';
}
// Задание 2
$text2 = "Присвоить переменной \$d значение в промежутке [0..15]. 
С помощью оператора switch организовать вывод чисел от \$d до 15.
При желании сделайте это задание через рекурсию.";

$d = random_int(0, 15);

$func = function($n) use (&$func){
    if ($n == 15) return "15.";
    echo $n . "<br>";
    return $func($n + 1);
};

/*Решение через switch.
    switch($d){
        case 0: echo '0 <br>';
        case 1: echo '1 <br>';
        case 2: echo '2 <br>';
        case 3: echo '3 <br>';
        case 4: echo '4 <br>';
        case 5: echo '5 <br>';
        case 6: echo '6 <br>';
        case 7: echo '7 <br>';
        case 8: echo '8 <br>';
        case 9: echo '9 <br>';
        case 10: echo '10 <br>';
        case 11: echo '11 <br>';
        case 12: echo '12 <br>';
        case 13: echo '13 <br>';
        case 14: echo '14 <br>';
        case 15: echo '15 <br>'; 
        break;
    } 
*/

//Задание 3
$text3 = "Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. 
Обязательно использовать оператор return. В делении проверьте деление на 0 и верните текст ошибки.";

function sum(int $a, int $b)
{
    $sum = $a + $b;
    return "Сумма равна: " . $sum;
};

function subtr(int $a, int $b)
{
    $substr = $a - $b;
    return "Разность равна: " . $substr;
};

function multipl(int $a, int $b)
{
    $mult = $a * $b;
    return "Произведение равна: " . $mult;
};

function div(int $a, int $b)
{
    if($b === 0){
        $div = 'Делить на ноль нельзя';
    } else {
        $div = "Частное равно: " . (int) ($a / $b);
    };

    return $div;
};

// Задание 4
$text4 = "Реализовать функцию с тремя параметрами: function mathOperation(\$arg1, \$arg2, \$operation), 
где \$arg1, \$arg2 – значения аргументов, \$operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).";

$arr = array("*", "/", "+", "-");
$c = array_rand($arr, 1); 

function mathOperation(int $a, int $b, $c)
{
    switch ($c) {
        case '+':
            return sum($a, $b);
        case '*':
            return  multipl($a, $b);
        case '-':
            return subtr($a, $b);
        case '/':
            return div($a, $b);
    }
};

// //Пока что не удалось завершить
// Задание 6
// $text6 = "С помощью рекурсии организовать функцию возведения числа в степень. 
// Формат: function power(\$val, \$pow), где \$val – заданное число, \$pow – степень.";
// function power($val, $pow)
// {
//     if($val = 0) return 0;
//     elseif($pow == 0) return 1;
//     elseif($pow == 1) return $val;
//     echo $val = $val * $val;
//     // return power ($val, $pow - 1);
    
//     // elseif ($pow < 0) return $power(1/$val, -$pow);
//     // else return $val * $power($val, $pow-1);
// };

// echo power(5, 2);
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
    <h2>Задание 1</h2>
    <h3><?= $text1 ?></h3>
    <p><?= $text1_2 ?></p>

    <h2>Решение: </h2>
    <p>$a = <?= $a ?></p>
    <p>$b = <?= $b ?></p>
    <p>Итого: <?= $c ?></p>

    <h2>Задание 2</h2>
    <h3><?= $text2 ?></h3>
    <h2>Решение: </h2>
    <p>$d = <?=  "$d;<br>"?><?=$func($d)?>
    </p>
    <h2>Задание 3</h2>
    <h3><?= $text3 ?></h3>
    <h2>Решение: </h2>
    <p><?= "\$a = $a; <br> \$b = $b; <br>" ?> <?= sum($a, $b) ?></p>
    <h2>Задание 4</h2>
    <h3><?= $text4 ?></h3>
    <h2>Решение: </h2>
    <p><?= "\$a = $a; <br> \$b = $b; <br> \$c = $arr[$c];<br>" ?>
        <?= mathOperation($a, $b, $arr[$c]) ?>
    </p>
    <h2>Задание 6</h2>
    <h3><?= $text6 ?></h3>
    <h2>Решение: </h2>
    <p><?= "Не получилось реализовать"?></p>
</body>

</html>