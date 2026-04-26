<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryAbillity extends Model
{
    protected $fillable = [
        'name',
        'name_en',
        'class_icon',
        'svg',
        'image'
    ];

    public function abillities() {
        return $this->hasMany(Abillity::class, 'category_id');
    }

    public function getLocalizedName(): string
    {
        if (app()->getLocale() === 'en' && $this->name_en) {
            return $this->name_en;
        }
        return $this->name;
    }
}
