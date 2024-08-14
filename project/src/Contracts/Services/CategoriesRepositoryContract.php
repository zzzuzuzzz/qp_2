<?php

namespace ProjectApp\Contracts\Services;

use Illuminate\Support\Collection;

interface CategoriesRepositoryContract
{
    public function getCategories(?int $count = null): Collection;
}