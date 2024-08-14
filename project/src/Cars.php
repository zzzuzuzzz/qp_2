<?php

namespace ProjectApp;

use ProjectApp\Exceptions\ValidateException;
use ProjectApp\Repositories\CarsRepository;
use Symfony\Component\HttpFoundation\Session\Session;
use ProjectApp\Models\Car;

class Cars
{
    public function __construct(private readonly Session $storage)
    {
    }

    public function validate(int|string $id, string $name, int $price, string|int $old_price, int $category, array $colors, int $is_published): array
    {
        if (empty($name) && empty($price) && empty($category)) {
            throw new ValidateException();
        }
        return ['id' => $id, 'name' => $name, 'price' => $price, 'old_price' => $old_price, 'category' => $category, 'colors' => $colors, 'is_published' => $is_published];
    }

    public function store($data): void
    {
        $car = new CarsRepository();
        $car->store($data);
        $this->storage->set('car', $car);
    }

    public function update($data): void
    {
        $car = new CarsRepository();
        $car->update($data);
        $this->storage->set('car', $car);
    }
}