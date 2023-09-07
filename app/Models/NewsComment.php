<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NewsComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content', 'user_id', 'news_id'
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
