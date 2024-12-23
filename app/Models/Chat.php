<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
