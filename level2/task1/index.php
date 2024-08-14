<?php

require __DIR__ . '/autoload.php';

use App\Basket\Basket;
use App\Product;
use App\Order;

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
