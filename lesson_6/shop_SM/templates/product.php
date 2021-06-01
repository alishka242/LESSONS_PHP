<div class="product">
    <h2><?= $product['name'] ?></h2>
    <img src='/img/catalog/<?= $product['img_name'] ?>' alt='photo'>
    <p>Описание: <?= $product['description'] ?></p>
    <p class="productPrice">Цена: <?= $product['price'] ?></p>
    <button>Купить</button>
</div>