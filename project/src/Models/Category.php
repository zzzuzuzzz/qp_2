<?php

namespace ProjectApp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}