<?php

namespace App\Models;

use Cache;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'description',
    ];

    public function getCategoriesForNaviBar()
    {
        return Cache::remember(Consts::CATEGORIES_CACHE_KEY, Consts::CATEGORIES_CACHE_KEY_EXPIRE_MINUTES, function () {
            return $this->query()->where('status', 1)->get()->toJson();
        });
    }
}
