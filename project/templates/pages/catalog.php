<?php

use ProjectApp\View;

View::includeTemplate('layouts/header.php', ['title' => 'Каталог', 'pageTitle' => 'QSOFT учебный сайт - Каталог', 'currentPage' => 'catalog']);
?>
<?php View::includeTemplate('blocks/cars_catalog.php', ['cars' => $cars]) ?>
<?php View::includeTemplate('layouts/footer.php') ?>