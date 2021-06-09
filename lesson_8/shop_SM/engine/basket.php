<?php
function addProduct(int $productId)
{
    $session = session_id();
    $userId = getUserId()['id'];

    //проверяем есть ли товар в корзине
    $productInBasket = getOneResult("SELECT * FROM basket WHERE product_id = '{$productId}' AND (`session_id` = '{$session}' OR `user_id` = '{$userId}')");
    if ($productInBasket) {
        $symb = '+';
        countDownOrUp($productId, $symb, $session, $userId);
    } else {
        $productPrice = getOneResult("SELECT price FROM products WHERE `id` = {$productId}")['price'];
        $sql = "INSERT INTO basket (`session_id`, `product_id`, price) VALUES ('{$session}','{$productId}', '{$productPrice}')";
        executeQuery($sql);
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
}

function getUserId()
{
    if (is_auth()) {
        $login = $_SESSION['login'];
        $id = getOneResult("SELECT id FROM users WHERE `login` = '{$login}'");
        return $id;
    }
    return NULL;
}

function getAllProducts($action, $pr_id)
{
    $session = session_id();
    $userId = getUserId()['id'];

    if (isset($action)) {
        doAction($action, $pr_id, $session, $userId);
    }

    $sql = "SELECT b.product_id AS product_id, b.price AS price, b.`count` AS `count`, p.name AS product_name, p.img_name AS img_name FROM basket AS b, products AS p WHERE  (b.`session_id` = '{$session}' OR b.`user_id` = '{$userId}') AND b.product_id = p.id";

    return getAssocResult($sql);
}

function doAction($action, $pr_id, $session, $userId)
{
    switch ($action) {
        case 'countDown':
            $symb = '-';
            countDownOrUp($pr_id, $symb, $session, $userId);
            break;
        case 'countUp':
            $symb = '+';
            countDownOrUp($pr_id, $symb, $session, $userId);
            break;
        case 'deleteProduct':
            deleteProduct($pr_id, $session, $userId);
            break;
    }
}

function countDownOrUp($pr_id, $symb, $session, $userId)
{
    $count = "SELECT `count` FROM basket WHERE (`session_id` = '{$session}' OR `user_id` = '{$userId}') AND product_id = {$pr_id}";

    if ($count == 1 && $symb = '-') {
        return deleteProduct($pr_id, $session, $userId);
    }

    $sql = "UPDATE basket SET `count` = `count` {$symb} 1  WHERE `product_id` = {$pr_id} AND (`session_id` = '{$session}' OR `user_id` = '{$userId}')";
    return executeQuery($sql);
}

function deleteProduct($pr_id, $session, $userId)
{
    $sql = "DELETE FROM basket WHERE (`session_id` = '{$session}' OR `user_id` = '{$userId}') AND product_id = '{$pr_id}'";
    return executeQuery($sql);
}


function getSum()
{
    $session = session_id();
    $result = getOneResult("SELECT SUM(price * `count`) AS `sum` FROM `basket` WHERE `session_id` = '{$session}'");
    return $result['sum'];
}

function getMessage($message = "")
{
    if ($message == 'message') {
        return $_SESSION['message'] = 'Заказ успешно оформлен!';
    }
    unset($_SESSION['message']);
}

function createOrder()
{

    if (isset($_POST['send'])) {
        $name = mysqli_real_escape_string(getDb(), strip_tags(stripslashes($_POST['name'])));
        $phone = mysqli_real_escape_string(getDb(), strip_tags(stripslashes($_POST['phone'])));
        $session_id = session_id();
        $sql = "SELECT product_id FROM basket WHERE `session_id` = '{$session_id}'";
        $arrProducts = getAssocResult($sql);

        foreach ($arrProducts as $key => $produt_id) {
            $sql = "INSERT INTO `orders` (`name`, `phone`, `session_id`, product_id) VALUES ('{$name}', '{$phone}', '{$session_id}', '{$produt_id['product_id']}')";
            executeQuery($sql);
        }
        session_regenerate_id(); //чистит корзину

        header("Location: /basket/message");
        die();
    }
}
