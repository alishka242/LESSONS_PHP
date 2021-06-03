<div class="product">
    <?php if ($product): ?> 
    <h2><?= $product['name'] ?></h2>
    <img src='/img/catalog/<?= $product['img_name'] ?>' alt='photo'>
    <p>Описание: <?= $product['description'] ?></p>
    <p class="productPrice">Цена: <?= $product['price'] ?></p>
    <button>Купить</button>
    <? else: ?>
    <p>Такого товара не существует</p>
    <? endif; ?>
</div>