<?php

namespace ProjectApp\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use ProjectApp\Contracts\Services\CategoriesRepositoryContract;
use ProjectApp\Models\Category;

class CategoriesRepository implements CategoriesRepositoryContract
{
    public function getCategories(?int $count = null): Collection
    {
        return Category::query()
            ->when($count > 0, fn(Builder $query) => $query->limit($count))
            ->get();
    }
}