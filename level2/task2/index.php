<?php
require 'vendor/autoload.php';

use Exception;
use MezencevEQschool\Task2\User;
use MezencevEQschool\Task2\UserFormValidator;

$success = false;
$error = '';
if (!empty($_POST)) {
    try {
        $user = new User();
        $user->load((int)$_POST['id']);

        $success = (new UserFormValidator())->validate($_POST);

        if ($success) {
            if ($user->save($_POST)) {
                echo 'Данные пользователя успешно изменены.';
            } else {
                throw new Exception('Не удалось сохранить пользователя в базе данных.');
            }
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма</title>
</head>
<body>
    <?php if ($error) { ?>
        <div style="color: red;"><?= htmlspecialchars($error) ?></div>
    <?php } ?>
    <form method="post">
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name"><br>

        <label for="age">Возраст:</label>
        <input type="number" id="age" name="age"><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email"><br>

        <label for="id">ID:</label>
        <input type="number" id="id" name="id" required><br>

        <button type="submit">Сохранить</button>
    </form>
</body>
</html>