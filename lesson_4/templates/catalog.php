<h2>Каталог</h2>
<div>
    <?php  
    foreach ($catalog as $key => $value) {
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