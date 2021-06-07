<h2>Новости: </h2>
<div class="newsLine">
    <?php foreach ($news as $item) : ?>

        <a href="/newsone/<?= $item['id'] ?>">
            <b><?= $item['title'] ?></b>
        </a>

    <? endforeach; ?>
</div>