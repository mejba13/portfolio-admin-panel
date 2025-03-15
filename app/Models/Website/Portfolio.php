<?php

namespace App\Models\Website;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'color',
        'url',
        'image',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'date',
    ];
}
