<h2>Отзывы</h2>
<form action="/comments/<?=$params['action']['uri_2']?>" method="post" class="formComments">
    <input type="text" name="name" placeholder="Ваше имя" value="<?=$params['action']['edit']['name']?>">
    <input type="text" name="text" placeholder="Отзыв" value="<?=$params['action']['edit']['text']?>">
    <input type="submit" value="<?=$params['action']['textBtn']?>" class="bntFormComm">
</form>

<div>
    <?php
    foreach ($comments as $item => $value): ?>
        <div class="commentDiv"> 
            <b><?=$value['name']?></b>
            <p><?=$value['text']?></p>
            <p><?=$value['createdAt']?></p>
            <a href="/comments/edit/<?=$value['id']?>">[Изменить]</a>
            <a href="/comments/delete/<?=$value['id']?>">[X]</a>
        </div>
    <?endforeach;?>
</div>