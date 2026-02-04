<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'in_stock',
        'rating',
        'category_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopePriceFrom($query, $value)
    {
        return $query->where('price', '>=', $value);
    }

    public function scopePriceTo($query, $value)
    {
        return $query->where('price', '<=', $value);
    }

    public function scopeRatingFrom($query, $value)
    {
        return $query->where('rating', '>=', $value);
    }
}
