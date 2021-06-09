<h2>Каталог</h2>
<div class="catalogPage">
    <?php foreach ($catalog as $key => $value) : ?>
        <div>
        <a href="/product/<?= $value['id'] ?>">
            <h3><?= $value['name'] ?></h3>
            <img src='/img/catalog/<?= $value['img_name'] ?>' alt='photo' width='150'>
            <p>Цена: <?= $value['price'] ?></p>
        </a>
        <a href="/buy/<?=$value['id']?>" name="buy">Купить</a>
        </div>
    <? endforeach; ?>
</div>