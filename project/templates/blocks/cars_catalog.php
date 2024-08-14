<div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-6">
    <?php foreach ($cars as $car) { ?>
        <?php \ProjectApp\View::includeTemplate('blocks/car_item.php', ['car' => $car]) ?>
    <?php } ?>
</div>