<?php
function checkReques($str)
{
    return strip_tags(htmlspecialchars(mysqli_escape_string(getDb(), $str)));
}

function getAllComments()
{
    $sql = 'SELECT * FROM comments ORDER BY createdAt DESC';
    return getAssocResult($sql);
}

function getCommentAction($action, $idComment)
{
    $params['textBtn'] = 'Добавить';
    $params['uri_2'] = 'add';
    $name = checkReques($_POST['name']);
    $text = checkReques($_POST['text']);

    if ($action == 'add') {
        if($name !== "" || $text !== ""){
            addComment($name, $text);
            header("Location: /comments");
        }
    }
    if ($action == 'edit') {
        $params['edit'] = editComment($idComment);
        $params['textBtn'] = 'Изменить';
        $params['uri_2'] = "update/$idComment";
    }
    if ($action == 'update') {
        updateComment($name, $text, $idComment);
        header('Location: /comments');
    }
    if ($action == 'delete') {
        deleteComment($idComment);
        header('Location: /comments');
    }

    return $params;
}

function addComment($name, $text)
{
    $sql = "INSERT INTO comments(`name`, `text`) VALUES ('{$name}', '{$text}')";
    return executeQuery($sql);
}

function editComment($id)
{
    $sql = "SELECT `name`, `text` FROM comments WHERE id = {$id}";
    return getOneResult($sql);
}

function updateComment($name, $text, $id)
{   
    $sql = "UPDATE comments SET `name` = '{$name}', `text`= '{$text}' WHERE id = {$id}";
    return executeQuery($sql);
}

function deleteComment($id)
{
    $sql = "DELETE FROM comments WHERE id = {$id}";
    executeQuery($sql);
}


function getTextBtn()
{
}
