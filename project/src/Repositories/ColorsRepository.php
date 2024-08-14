<?php

namespace ProjectApp\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use ProjectApp\Contracts\Services\ColorsRepositoryContract;
use ProjectApp\Models\Color;

class ColorsRepository implements ColorsRepositoryContract
{
    public function getColors(?int $count = null): Collection
    {
        return Color::query()
            ->when($count > 0, fn(Builder $query) => $query->limit($count))
            ->get();
    }
}