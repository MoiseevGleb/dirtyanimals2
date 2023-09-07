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
        'title', 'content', 'user_id',
    ];

    public function getCreatedAtAttribute($attribute)
    {
        return Carbon::parse($attribute)->diffForHumans();
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
