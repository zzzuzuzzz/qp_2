<?php

use ProjectApp\View;

View::includeTemplate('layouts/header.php', ['title' => 'Форма создания модели', 'pageTitle' => 'QSOFT учебный сайт - Каталог', 'currentPage' => 'admin']);
?>
    <form method="post" action="/admin/store">
        <div class="mt-8 max-w-md">
            <div class="grid grid-cols-1 gap-6">
                <div class="block">
                    <label for="field1" class="text-gray-700 font-bold">Введите название модели</label>
                    <input required id="field1" name="name" type="text"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           placeholder="KIA RIO">
                </div>
                <div class="block">
                    <label for="field2" class="text-gray-700 font-bold">Введите цену с скидкой</label>
                    <input required id="field2" name="price" type="number"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           placeholder="1000000">
                </div>
                <div class="block">
                    <label for="field3" class="text-gray-700 font-bold">Введите цену без скидки</label>
                    <input id="field3" name="old_price" type="number"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           placeholder="1500000">
                </div>
                <div class="block">
                    <label for="field4" class="text-gray-700 font-bold">Выберете нужный вариант</label>
                    <select id="field4" name="category"
                            class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?= htmlspecialchars($category->id) ?>"><?= htmlspecialchars($category->name) ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="block">
                    <div class="mt-2">
                        <div>
                            <?php foreach ($colors as $color) { ?>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="colors[]" value="<?= htmlspecialchars($color->id) ?>"
                                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50"
                                           checked>
                                    <span class="ml-2"><?= htmlspecialchars($color->name) ?></span>
                                </label>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="block">
                    <button type="submit"
                            class="inline-block bg-red-600 hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                        Сохранить
                    </button>
                    <button type="reset"
                            class="inline-block bg-gray-400 hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                        Отменить
                    </button>
                </div>
            </div>
        </div>
    </form>
<?php View::includeTemplate('layouts/footer.php') ?>