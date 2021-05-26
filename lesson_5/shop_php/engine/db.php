<?php

function getDb(){
    static $db = null;
    if (is_null($db)){
        $db = @mysqli_connect(HOST, USER, PASS, DB) or die("Couldn't connect: " . mysqli_connect_error());
        return $db;
    }
}

/*
* Обертка для выполнения запроса на получение данных
* Данные возвращаются в виде ассоциативного массива
* Цикл по получению данных уже реализован в этой ф-ии
* Возврат нескольких записей в виде массива
*/

function getAssocResult($sql){
    $result = mysqli_query(getDb(), $sql) or die(mysqli_error(getDb()));
    $array_result = [];
    while($row = $result->fetch_assoc()){
        $array_result[] = $row;
    }

    return $array_result;
}

// WHERE id = 1;
function getOneResult($sql){
    $result = mysqli_query(getDb(), $sql) or die(mysqli_error(getDb()));
    return $result->fetch_assoc();
}

// Определяет кол-во строк при удалении или добавлении, либо равно 0
function executSql($sql){
    $result = mysqli_query(getDb(), $sql) or die(mysqli_error(getDb()));
    return mysqli_affected_rows(getDb());
}
