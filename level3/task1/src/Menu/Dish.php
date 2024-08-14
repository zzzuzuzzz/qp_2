<?php 

namespace MezencevEQschool\Level3\Task1\Menu;

abstract class Dish
{
    abstract public function getName(): string;
    abstract public function getPrice(): int;
}