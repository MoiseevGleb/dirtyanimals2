<?php

namespace App\Traits\Models;

use Illuminate\Database\Eloquent\Model;

trait HasSlug
{
    public static function bootHasSlug(): void
    {
        static::creating(function (Model $model) {
            $model->slug = self::makeSlug($model);
        });
    }

    public static function makeSlug(Model $model): string
    {
        if ($model->slug) {
            return $model->slug;
        }

        $defaultSlug = str($model->{self::slugFrom()})->slug();
        $slug = $defaultSlug;
        $equalSlugCounter = 0;

        while ($model::query()->where('slug', 'like', $slug)->exists())
        {
            $equalSlugCounter++;
            $slug = $defaultSlug . "-{$equalSlugCounter}";
        }

        return $slug;
    }

    public static function slugFrom(): string
    {
        return 'title';
    }
}
