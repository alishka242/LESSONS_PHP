<?php
if (isset($_GET['logout'])) {
    setcookie('hash', '', time() - 3600, '/');
    session_destroy();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    // header('Location: ' . $_SERVER['HTTP_REFERER']); - переведет на предыдущую стр после перехода на новую(обновления)
    die();
}

function get_user()
{
    session_start();
    $allow = false;
    return $_SESSION['login'];
}

function is_admin()
{
    return $_SESSION['login'] == 'admin';
}

function auth($login, $pass)
{
    $db = getDb();
    $login = mysqli_real_escape_string($db, strip_tags(stripslashes($login)));
    $result = mysqli_query($db, "SELECT * FROM users WHERE login = '{$login}'");
    $row = mysqli_fetch_assoc($result);
    //password_verify() - хэштровать пароль
    if ($pass == $row['pass']) {
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $row['id'];
        return true;
    }
    return false;
}

if (is_auth()) {
    $allow = true;
    $user = get_user();
}

function is_auth()
{
    //оптимизировать с учетом, что п-ль уже может быть авторизован по сессии
    if (isset($_COOKIE["hash"])) {
        $hash = $_COOKIE["hash"];
        $db = getDb();
        $sql = "SELECT * FROM users WHERE `hash` = '{$hash}'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
        $user = $row['login'];
        if (!empty($user)) {
            $_SESSION['login'] = $user;
            $_SESSION['id'] = $row['id'];
        }
    }
    return isset($_SESSION['login']);
}

if (isset($_POST['ok'])) {
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    if (auth($login, $pass)) {
        if (isset($_POST['save'])) {
            $hash = uniqid(rand(), true);
            $db = getDb();
            $id = $_SESSION['id'];
            $sql = "UPDATE users SET `hash` = '{$hash}' WHERE id = '{$id}'";
            $result = mysqli_query($db, $sql);
            setcookie("hash", $hash, time() + 3600, '/');
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    } else {
        die("Данные не верны");
    }
}
