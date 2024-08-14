<?php

namespace MezencevEQschool\Level3\Task1\Menu;

use MezencevEQschool\Level3\Task1\Menu\Dish;

class Salad extends Dish
{
    public function getName(): string
    {
        return "Салат цезарь";
    }

    public function getPrice(): int
    {
        return 200;
    }
}