<?php
//MODEL

// Соединение с БД
function getDb(){
    static $db = null;
    if (is_null($db)){
        $db = @mysqli_connect(HOST, USER, PASS, DB) or die("Couldn't connect: " . mysqli_connect_error());
    }
    return $db;
}

//закрыть соединение (если уж и вызывать, то после render на главной)
function closeDb(){
    mysqli_close(getDb());
}

/* Обертка для выполнения любого запроса
 * Передаем в параметре текст sql-запроса
 * Возвращаем результат, в основном использовать для
 * операций update и delete, которые не требуют возврата данных
 */
function executeQuery($sql)
{
    return @mysqli_query(getDb(), $sql) or die(mysqli_error(getDb()));
}

/* Обертка для выполнения запроса на получение данных
 * Данные возвращаются в виде ассоциативного массива
 * Цикл по получению данных уже реализован в этой функции
 */
function getAssocResult($sql){
    $result = mysqli_query(getDb(), $sql) or die(mysqli_error(getDb()));
    $array_result = [];
    
    while($row = $result->fetch_assoc()){
        $array_result[] = $row;
    }
    
    return $array_result;
}

function getOneResult($sql){
    $result = mysqli_query(getDb(), $sql) or die(mysqli_error(getDb()));
    return $result->fetch_assoc();
}