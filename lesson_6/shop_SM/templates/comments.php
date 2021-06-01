<h2>Отзывы</h2>
<form action="/commentsadd" method="post" class="formComments">
    <input type="text" name="guestName" placeholder="Ваше имя">
    <input type="text" name="textComment" placeholder="Отзыв">
    <input type="submit" value="Отправить" class="bntFormComm">
</form>
<p><?=$messages?></p>

<div>
    <?php
    foreach ($comments as $item => $value): ?>
        <div class="commentDiv"> 
            <b><?=$value['guestName']?></b>
            <p><?=$value['textComment']?></p>
            <p><?=$value['createdAt']?></p>
        </div>
    <?endforeach;?>
</div>