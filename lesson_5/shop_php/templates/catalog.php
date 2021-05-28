<h2>Каталог</h2>
<div>
    <?php  
    foreach ($catalog as $key => $value) {
        //не было времени передать. на дз мне требуется больше времени чем остальны видимо.. потом переделаю
        echo "
        <div>
        <h2>{$value['name']}</h2>
            <img src='{$value['href']}.png' alt='photo' width='150'>
            <p>Цена: {$value['price']}</p>
            <button>Купить</button>
        </div>
        ";
    }
    ?>
</div>