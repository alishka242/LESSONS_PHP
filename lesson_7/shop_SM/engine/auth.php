<?php
session_start();

//Разлогиниться
function logout(){
    setcookie('hash', '', time() - 3600, '/');
    session_destroy();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    // header('Location: ' . $_SERVER['HTTP_REFERER']); - переведет на предыдущую стр после перехода на новую(обновления)
    die();
}

//авторизация п-ля
function auth($login, $pass){
    $login = mysqli_real_escape_string(getDb(), strip_tags(stripslashes($login)));
    $result = getOneResult("SELECT * FROM users WHERE login = '{$login}'");
    
    //password_verify() - хэштровать пароль
    if($pass == $result['pass']){
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $result['id'];
        return true;
    }
    return false;
}

if (isset($_POST['ok'])) {
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    if(auth($login, $pass)){
        if (isset($_POST['save'])){
            $hash = uniqid(rand(), true);
            $id = $_SESSION['id'];
            $sql = "UPDATE users SET `hash` = '{$hash}' WHERE id = '{$id}'";
            $result = executeQuery($sql);
            setcookie("hash", $hash, time() + 3600, '/');

        }
        header('Location: /');
        die();
    } else {
        die("Данные не верны");
    }
}

//После аутентификации появится кнопка выйти из учетки
function returnAllow(){
    if(is_auth()){
        return true;
    }
    return false;
}

//проверка сохранился ли в сессии логин, если да, то приветствие будет по логину
function get_user()
{
    return $_SESSION['login'];
}

// Смотрим п-ль уже был авторизирован по сессии или по кукам или нет
function is_auth(){
    if (isset($_COOKIE["hash"])){
        $hash = $_COOKIE["hash"];
        $sql = "SELECT * FROM users WHERE `hash` = '{$hash}'";
        $result = getOneResult($sql);
        $user = $result['login'];
        if (!empty($user)){
            $_SESSION['login'] = $user;
            $_SESSION['id'] = $result['id'];
        }
        return $user;
    }
    $user = get_user();
    return $user;
}