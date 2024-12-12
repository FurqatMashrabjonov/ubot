<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'path',
        'thumbnails',
        'file_id',
        'file_unique_id',
        'width',
        'height',
        'file_size',
    ];
}
