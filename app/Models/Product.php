<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Product extends Model
{

    protected $fillable = [
        'name',
        'description',
        'image',
        'is_default',
        'module_path',
        'category_id',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getFullImagePathAttribute(): string
    {
        return public_path('storage/' . $this->image);
    }

    public function image(): HasOneThrough
    {
        return $this->hasOneThrough(Image::class, ProductImage::class, 'product_id', 'id', 'id', 'image_id');
    }

}
