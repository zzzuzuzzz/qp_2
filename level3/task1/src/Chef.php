<?php 

namespace MezencevEQschool\Level3\Task1;

use MezencevEQschool\Level3\Task1\Cook;

class Chef extends Cook
{
    protected function getOrderPrice(): int
    {
        return parent::getOrderPrice() * 5;
    }
    protected function getCookRole(): string
    {
        return 'Шеф повар';
    }
}