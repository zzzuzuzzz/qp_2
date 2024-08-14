</thead>
<?php foreach ($cars as $car) { ?>
    <?php \ProjectApp\View::includeTemplate('blocks/admin/table_line.php', ['car' => $car]) ?>
<?php } ?>
<tbody>
