<h2>Корзина</h2>
<p><?=$params['message']?></p>
<div class="basket">
    <div>
        <?php foreach ($params['basketProducts'] as $key => $value) : ?>
            <?php if ($value['count'] > 0) : ?>
                <div class="basketItem">
                    <img src="/img/catalog/<?= $value['img_name'] ?>" width="50" alt="img">
                    <div class="basketItemInfo">

                        <h3><a href="/product/<?= $value['product_id'] ?>">
                                <?= $value['product_name'] ?>
                                <?= $value['product_id'] ?>
                            </a>
                        </h3>
                        <p><?= $value['price'] ?> руб.</p>
                        <p>
                            <span>Кол-во: <?= $value['count'] ?></span>
                            <a href="/basket/countDown/<?= $value['product_id'] ?>">[-]</a>
                            <a href="/basket/countUp/<?= $value['product_id'] ?>">[+]</a>
                        </p>
                    </div>
                    <a href="/basket/deleteProduct/<?= $value['product_id'] ?>">[X]</a>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <?php if ($params['sum'] > 0) : ?>
        <div>
            <h3>Сумма заказа: <?= $params['sum'] ?> руб.</h3>

            <a class="order-button" href="/order/<?= $params['sum'] ?>">
                <h3>Перейти к оформлению</h3>
            </a>
        <?php else : ?>
            <p>Пока ничего нет</p>
        <?php endif; ?>
        </div>
</div>