<div>
    <?php if ($news) : ?>
        <h3><?= $news['title'] ?></h3>
        <br>
        <p><?= $news['text'] ?></p>
    <? else : ?>
        <p>Такой новости не существует</p>
    <? endif; ?>
</div>