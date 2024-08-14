<?php

namespace MezencevEQschool\Level3\Task1\Menu;

use MezencevEQschool\Level3\Task1\Menu\Dish;

class Dessert extends Dish
{
    public function getName(): string
    {
        return "Вафельный торт";
    }

    public function getPrice(): int
    {
        return 330;
    }
}