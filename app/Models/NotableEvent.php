<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotableEvent extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'event_date',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'event_date' => 'date',
    ];
}
