<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'user_id', 'show_author'
    ];

    public function getCreatedAtAttribute($attribute)
    {
        return Carbon::parse($attribute)->timezone('Europe/Moscow')->translatedFormat('d.m.Y в H:i');
    }

    public function getUpdatedAtAttribute($attribute)
    {
        return Carbon::parse($attribute)->timezone('Europe/Moscow')->translatedFormat('j.m.Y в H:i');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(NewsComment::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
