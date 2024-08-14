<?php

namespace App;

class Product
{
    public function __construct(
        private string $title,
        private int $price,
    ) {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}
