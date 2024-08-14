<?php

namespace App;

use App\Basket\Basket;

class Order
{
    public function __construct(
        private Basket $basket,
    ) {
    }

    public function getPrice(): float
    {
        return $this->basket->getPrice() + 300;
    }

    public function getBasket(): Basket
    {
        return $this->basket;
    }
}
