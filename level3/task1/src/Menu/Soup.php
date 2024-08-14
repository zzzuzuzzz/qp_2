<?php

namespace MezencevEQschool\Level3\Task1\Menu;

use MezencevEQschool\Level3\Task1\Menu\Dish;

class Soup extends Dish
{
    public function getName(): string
    {
        return "Суп куринный";
    }

    public function getPrice(): int
    {
        return 250;
    }
}