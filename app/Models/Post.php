<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#Fillable[ 'author_id',
        'title',
        'slug',
        'content',
        'excerpt',
        'featured_image',
        'published_at',
        'is_published' ];
class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'published_at' => 'datetime',
        'is_published' => 'boolean',
    ];

    public function author(): BelongsTo {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function isPublished(): bool
    {
        return $this->is_published && $this->published_at?->isPast();
    }
}
