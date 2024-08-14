<?php

namespace App\Basket;

use App\Product;
use App\Basket\BasketPosition;

class Basket
{
    public function __construct(
        private array $compound = [],
    ) {
    }

    public function addProduct(Product $product, int $quantity): void
    {
        $this->compound[] = new BasketPosition($product, $quantity);
    }

    public function getPrice(): float
    {
        $result = 0;
        foreach ($this->compound as $item) {
            $result += $item->getPrice();
        }
        return $result;
    }

    public function describe(): void
    {
        foreach ($this->compound as $item) {
            echo $item->getProduct()->getTitle() . ' - ' . $item->getProduct()->getPrice() . ' - ' . $item->getNumber() . ' штук ';
        }
    }
}
