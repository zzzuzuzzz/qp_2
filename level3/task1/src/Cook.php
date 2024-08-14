<?php

namespace MezencevEQschool\Level3\Task1;

use MezencevEQschool\Level3\Task1\Menu\Dish;

class Cook
{
    /** @var array|Dish[] */
    private array $order = [];

    public function addDishToOrder(Dish $dish): void
    {
        $this->order[] = $dish;
    }

    protected function getOrderPrice(): int
    {
        $sum = 0;
        foreach ($this->order as $order) {
            $sum += $order->getPrice();
        }
        return $sum;
    }

    protected function getCookRole(): string
    {
        return 'Повар';
    }

    public function prepareFood(): void
    {
        foreach ($this->order as $orderElemnt) {
            echo $this->getCookRole() . ' приготовил: ' . $orderElemnt->getName() . "<br>";
        }
        echo "Сумма заказа: " . $this->getOrderPrice() . "<br>";
    }
}