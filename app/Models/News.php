<?php

namespace App\Models;

use App\Traits\Models\HasSlug;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class News extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'title', 'slug', 'content', 'user_id', 'show_author'
    ];

    protected $casts = [
        'show_author' => 'boolean'
    ];

    public function getCreatedAtAttribute($attribute)
    {
        return Carbon::parse($attribute)->timezone('Europe/Moscow')->translatedFormat('d.m.Y в H:i');
    }

    public function getUpdatedAtAttribute($attribute)
    {
        return Carbon::parse($attribute)->timezone('Europe/Moscow')->translatedFormat('j.m.Y в H:i');
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
