<?php
session_start();

//Разлогиниться
function logout()
{
    setcookie('hash', '', time() - 3600, '/');
    session_destroy();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
}

//авторизация п-ля
function auth($login, $pass)
{
    $result = getOneResult("SELECT * FROM users WHERE login = '{$login}'");

    //password_verify() - хэштровать пароль
    if ($result && $login !== '' && $pass !== '') {

        if ($pass == $result['pass']) {
            //Авторизация

            checkBasket(session_id(), $result['id']);
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $result['id'];
            return true;
        }
    }
    return false;
}

function checkBasket($session_id, $user_id)
{
    $sql = "SELECT * FROM basket WHERE `session_id` = '{$session_id}'";
    $getResult = getAssocResult($sql);

    if ($getResult) {
        $sql = "UPDATE basket SET user_id = ($user_id) WHERE `session_id` = '{$session_id}'";
        executeQuery($sql);
    }
}

function sing_in()
{
    if (isset($_POST['ok'])) {
        $login = mysqli_real_escape_string(getDb(), strip_tags(stripslashes($_POST['login'])));
        $pass = mysqli_real_escape_string(getDb(), strip_tags(stripslashes($_POST['pass'])));

        if (auth($login, $pass)) {

            if (isset($_POST['save'])) {
                $hash = uniqid(rand(), true);
                $id = $_SESSION['id'];
                $sql = "UPDATE users SET `hash` = '{$hash}' WHERE id = '{$id}'";
                executeQuery($sql);
                setcookie("hash", $hash, time() + 3600, '/');
            }

            return "Данные верны!";
        } else {
            return "Данные не верны";
        }
    }
}

function reg()
{
    if (isset($_POST['reg'])) {
        $login = mysqli_real_escape_string(getDb(), strip_tags(stripslashes($_POST['login'])));
        $pass = mysqli_real_escape_string(getDb(), strip_tags(stripslashes($_POST['pass'])));
        $session_id = session_id();
        $result = getOneResult("SELECT * FROM users WHERE login = '{$login}'");
        
        if ($result) {
            return "Проверьте правильность введеных данных. Возможно у Вас уже есть профиль.";
        } else {
            if (isset($_POST['save'])) {
                $hash = uniqid(rand(), true);
                $id = $_SESSION['id'];
                $sql = "UPDATE users SET `hash` = '{$hash}' WHERE id = '{$id}'";
                executeQuery($sql);
                setcookie("hash", $hash, time() + 3600, '/');
                
            }
            $sql = "INSERT INTO users (`login`, pass, `session_id`, `hash`) VALUES ('{$login}', '{$pass}', '{$session_id}', '{$hash}')";
            executeQuery($sql);
            return "Вы успешно зарегистрированны!";
        }
    }
}


//После аутентификации появится кнопка выйти из учетки
function returnAllow()
{
    if (is_auth()) {
        return true;
    }
    return false;
}

// Смотрим п-ль уже был авторизирован по сессии или по кукам или нет
function is_auth()
{
    if (isset($_COOKIE["hash"])) {
        $hash = $_COOKIE["hash"];
        $sql = "SELECT * FROM users WHERE `hash` = '{$hash}'";
        $result = getOneResult($sql);
        $user = $result['login'];
        if (!empty($user)) {
            $_SESSION['login'] = $user;
            $_SESSION['id'] = $result['id'];
        }
        return $user;
    }
    $user = get_user();
    return $user;
}

//проверка сохранился ли в сессии логин, если да, то приветствие будет по логину
function get_user()
{
    return $_SESSION['login'];
}
