<?php

namespace App\Models\Website;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
        'category_id',
    ];

    protected $casts = [
        'published_at' => 'date',
    ];

    public function category()
    {
        return $this->belongsTo(\App\Models\Blog\Category::class);
    }
}
