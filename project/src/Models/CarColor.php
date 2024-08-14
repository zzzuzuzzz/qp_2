<?php

namespace ProjectApp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CarColor extends Model
{
    protected $fillable = ['color_id', 'car_id'];
    public $timestamps = false;

    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(Car::class);
    }
}