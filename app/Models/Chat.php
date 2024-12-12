<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Chat extends Model
{
    protected $fillable = [
        'chat_id',
        'username',
        'first_name',
        'last_name',
        'status',
        'language_code',
        'phone_number',
    ];

    public function getFullNameAttribute(): string
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }

    public function product(): HasOneThrough
    {
        return $this->hasOneThrough(
            Product::class,
            ChatProduct::class,
            'chat_id',
            'id',
            'id',
            'product_id'
        );
    }
}
