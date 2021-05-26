<h2>Галерея</h2>
<div class="photoGallery">
    <?php
    foreach ($gallery as $numbGal => $value) {
        echo "
        <div>
            <a target='_blank' href='img/big/{$value}'>
            <img src='img/small/{$value}' width='150' height='100'/>
            </a>
        </div>
        ";
    }
    ?>
</div>