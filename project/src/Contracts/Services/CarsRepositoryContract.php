<?php

namespace ProjectApp\Contracts\Services;

use Illuminate\Support\Collection;
use ProjectApp\Models\Car;

interface CarsRepositoryContract
{
    public function getCars(?int $count = null): Collection;

    public function load(int $id): Car;

    public function delete(int $id): void;
}