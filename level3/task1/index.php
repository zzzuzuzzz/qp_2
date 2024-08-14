<?php

require(__DIR__ . "/vendor/autoload.php");

use MezencevEQschool\Level3\Task1\Chef;
use MezencevEQschool\Level3\Task1\Cook;
use MezencevEQschool\Level3\Task1\Menu\Dessert;
use MezencevEQschool\Level3\Task1\Menu\Salad;
use MezencevEQschool\Level3\Task1\Menu\Soup;

$salad = new Salad();
$soup = new Soup();
$dessert = new Dessert();

$cook = new Cook();
$cook->addDishToOrder($salad);
$cook->addDishToOrder($soup);
$cook->addDishToOrder($dessert);

$cook->prepareFood();

echo '<br>';

$chef = new Chef();
$chef->addDishToOrder($salad);
$chef->addDishToOrder($soup);
$chef->addDishToOrder($dessert);

$chef->prepareFood();
