<?php

namespace ProjectApp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Car extends Model
{
    protected $fillable = ['name', 'price', 'old_price', 'category_id', 'is_published', 'image'];
    public $timestamps = false;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class);
    }
}