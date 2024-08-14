<?php

namespace ProjectApp\Repositories;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use ProjectApp\Contracts\Services\CarsRepositoryContract;
use ProjectApp\Models\Car;

class CarsRepository implements CarsRepositoryContract
{
    public function getCars(?int $count = null): Collection
    {
        return Car::query()
            ->when($count > 0, fn(Builder $query) => $query->limit($count))
            ->get();
    }

    public function load(int $id): Car
    {
        return Car::with(['colors', 'category'])->findOrFail($id);
    }

    public function delete(int $id): void
    {
        Capsule::table('cars')->delete($id);
        Capsule::table('car_color')->where('car_id', $id)->delete();
    }

    public function store(array $data): void
    {
        if (is_string($data['old_price'])) {
            $data['old_price'] = null;
        }
        $car = Car::query()->create([
            'name' => $data['name'],
            'price' => $data['price'],
            'old_price' => $data['old_price'],
            'category_id' => $data['category'],
            'is_published' => false,
            'image' => '/assets/images/no_image.png',
        ]);
        foreach ($data['colors'] as $color) {
            Capsule::table('car_color')->insert([
                'car_id' => $car->id,
                'color_id' => $color
            ]);
        }
    }

    public function update(array $data): void
    {
        if (is_string($data['old_price'])) {
            if ($data['old_price'] != '') {
                $data['old_price'] = intval($data['old_price']);
            } else {
                $data['old_price'] = null;
            }
        }
        Car::query()->where('id', $data['id'])->update([
            'name' => $data['name'],
            'price' => $data['price'],
            'old_price' => $data['old_price'],
            'category_id' => $data['category'],
            'is_published' => $data['is_published'],
            'image' => '/assets/images/no_image.png',
        ]);
        Capsule::table('car_color')->where('car_id', $data['id'])->delete();
        foreach ($data['colors'] as $color) {
            Capsule::table('car_color')->insert([
                'car_id' => $data['id'],
                'color_id' => $color
            ]);
        }
    }
}