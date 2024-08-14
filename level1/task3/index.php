<?php

class Car
{
    public function __construct(
        public readonly string $name,
        public readonly int $price,
    ) {
    }
}

class CarFactory
{
    public function createCar(string $name): Car
    {
        $price = rand(1000000, 10000000);
        return new Car($name, $price);
    }
}

$carsName = [
    "Kia K5",
    "Kia Ceed",
    "Kia Cerato",
    "Kia Sorento",
    "BMW i7",
    "BMW i7",
    "BMW X7",
    "BMW X3",
    "Lada Granta",
    "Lada Vesta",
    "Lada Largus",
    "Lada Niva",
    "Mercedes E-Класс",
    "Mercedes s-Класс",
    "Mercedes AMG E",
    "Mercedes AMG C",
    "Volkswagen Polo",
    "Volkswagen Tiguan",
    "Volkswagen Passat",
    "Volkswagen Touareg"
];

$number = rand(5, 20);
$carFactory = new CarFactory();
$resultPrice = 0;

while ($number > 0) {
    $carNameNumber = rand(0, 19);
    $car = $carFactory->createCar($carsName[$carNameNumber]);
    echo '' . $car->name . ' - ' . number_format(num: $car->price, thousands_separator: ' ') . ' <br>';
    $resultPrice += $car->price;
    $number--;
}
echo 'Итого - ' . number_format(num: $resultPrice, thousands_separator: ' ');
