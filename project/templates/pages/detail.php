<?php

use ProjectApp\View;

View::includeTemplate('layouts/header.php', ['title' => $car->name, 'pageTitle' => 'QSOFT учебный сайт - Каталог - ' . $car->name, 'currentPage' => 'catalog']);
?>
    <img
            class="w-full h-full"
            src="<?= $car->image ? htmlspecialchars($car->image) : '/assets/images/no_image.png' ?>"
            alt="<?= htmlspecialchars($car->name) ?>"
    >
    <div class="px-6 py-4">
        <div class="text-black font-bold text-xl mb-2">Цена:</div>
        <p class="text-grey-darker text-base">
            <span class="inline-block"><?= \ProjectApp\View::includeTemplate('blocks/price.php', ['price' => $car->price]) ?></span>
            <?php if ($car->old_price) { ?>
                <span class="inline-block line-through pl-6 text-gray-400"><?= \ProjectApp\View::includeTemplate('blocks/price.php', ['price' => $car->price]) ?></span>
            <?php } ?>
        </p>
    </div>
    <div class="mb-2"><span
                class="text-black font-bold text-xl">Категория:</span> <?= htmlspecialchars($car->category->name) ?>
    </div>
    <div class="mb-2"><span
                class="text-black font-bold text-xl">Доступные цвета:</span> <?= htmlspecialchars($car->colors->pluck('name')->implode(', ')) ?>
    </div>
<?php View::includeTemplate('layouts/footer.php') ?>