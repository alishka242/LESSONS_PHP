<h2>Каталог</h2>
<div class="catalogPage">
    <?php foreach ($catalog as $key => $value) : ?>
        <div>
        <a href="/product/<?= $value['id'] ?>">
            <h3><?= $value['name'] ?></h3>
            <!-- Хотела в БД имена картинок хранить в одной таблице, но для вывода пришлось бы в foreach 
            $catalog перебирать еще один foreach $gallery, но решила пока для каждого товара хранить имена картинок в таблице products-->
            <img src='img/catalog/<?= $value['img_name'] ?>' alt='photo' width='150'>
            <p>Цена: <?= $value['price'] ?></p>
        </a>
        <button name="bye">Купить</button>
        </div>
    <? endforeach; ?>
</div>