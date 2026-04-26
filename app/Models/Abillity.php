<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Abillity extends Model
{
    protected $fillable = [
        'name',
        'name_en',
        'class_icon',
        'svg',
        'image',
        'level',
        'category_id'
    ];

    public function category(): BelongsTo  {
        return $this->belongsTo(CategoryAbillity::class, 'category_id');
    }

    public function getLocalizedName(): string
    {
        if (app()->getLocale() === 'en' && $this->name_en) {
            return $this->name_en;
        }
        return $this->name;
    }
}
