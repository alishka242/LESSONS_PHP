<?php
function getComments()
{
    $sql = 'SELECT * FROM comments ORDER BY createdAt DESC';
    return getAssocResult($sql);
}

function addComment()
{
    $db = getDb();
    $message = '';


    $guestName = strip_tags(htmlspecialchars(mysqli_escape_string($db, $_POST['guestName'])));
    $textComment = strip_tags(htmlspecialchars(mysqli_escape_string($db, $_POST['textComment'])));
    $sql = "INSERT INTO comments(guestName, textComment) VALUES ('{$guestName}', '{$textComment}')";
    executeQuery($sql);
    header('Location: /comments');
    if (isset($_GET['message'])) {
        $message = $message[$_GET['message']];
    }
}
