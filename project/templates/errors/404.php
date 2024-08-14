<?php

use ProjectApp\View;

View::includeTemplate('layouts/header.php', ['title' => '404 - Страница не
найдена', 'pageTitle' => 'QSOFT учебный сайт - Страница не найдена',
    'currentPage' => '404']);
?>
    <p>Запрошенная вами страница не существует</p>
<?php View::includeTemplate('layouts/footer.php') ?>