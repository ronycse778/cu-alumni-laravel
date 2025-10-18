<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = [
        'title',
        'description',
        'content',
        'image',
        'author',
        'published_date',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'published_date' => 'date',
    ];
}
