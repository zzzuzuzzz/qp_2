<?php
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

$product_1 = new Product('Apples', 120);
$product_2 = new Product('Bread', 50);
$product_3 = new Product('Water', 65);

$basket = new Basket();
$basket->addProduct($product_1, 1);
$basket->addProduct($product_2, 2);
$basket->addProduct($product_3, 5);

$order = new Order($basket);
echo 'Создан заказ, на общую сумму: ' . $order->getPrice() . '. Состав заказа: ';
echo '' . $order->getBasket()->describe() . '';
