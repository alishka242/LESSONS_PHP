<?php if ($params['image']) : ?>
    <h2>Картинка в большом размере</h2>
    <img src="/img/big/<?= $params['image']['name'] ?>" alt="photo">
    <p><b>Просмотров:</b> <?= $params['image']['likes'] ?></p>
<? else : ?>
    <p>Такой картинки не существует</p>
<? endif; ?>