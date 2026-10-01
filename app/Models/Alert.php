<?php

namespace App\Models;

use App\Enums\AlertLevel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    /** @use HasFactory<\Database\Factories\AlertFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'published_at',
        'description',
        'category_id',
        'level',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'level' => AlertLevel::class,
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
