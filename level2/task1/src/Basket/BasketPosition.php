<?php

namespace App\Basket;

use App\Product;

class BasketPosition
{
    public function __construct(
        private Product $product,
        private int $number,
    ) {
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getPrice(): int
    {
        return $this->product->getPrice() * $this->number;
    }
}
