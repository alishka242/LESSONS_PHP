<h2>Галерея</h2>
<div class="photoGallery">
    <?php
    foreach ($gallery as $item => $value): ?>
        
        <div> 
            <a href='/image/?id=<?=$value['id']?>'>
            <img src='img/small/<?=$value['name']?>' width='150' height='100'>
            </a>
            <p>Просмотров: <?=$value['likes']?></p>
        </div>
    <?endforeach;?>
</div>
<div>
    <h2>Загрузить изображение:</h2>
    <form class="formGallery" action="" method="post" enctype="multipart/form-data">
        <input type="file" name="img">
        <input type="submit" value="Загрузить" name="load">
    </form>
</div>