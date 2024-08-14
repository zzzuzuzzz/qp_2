<?php

namespace ProjectApp\Contracts\Services;

use Illuminate\Support\Collection;

interface ColorsRepositoryContract
{
    public function getColors(?int $count = null): Collection;
}