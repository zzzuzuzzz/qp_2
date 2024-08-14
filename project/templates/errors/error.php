<?php

use ProjectApp\View;

$code = $code ?? 500;
$message = $message ?? 'Упс, что-то пошло не так';
View::includeTemplate('layouts/header.php', ['title' => $code . ' - Возникла
ошибка', 'pageTitle' => 'QSOFT учебный сайт - Возникла ошибка', 'currentPage' =>
    'error']);
?>
    <p><?= htmlspecialchars($message) ?></p>
<?php View::includeTemplate('layouts/footer.php') ?>