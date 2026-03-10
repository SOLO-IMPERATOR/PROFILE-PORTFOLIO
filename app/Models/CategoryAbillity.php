<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryAbillity extends Model
{
    protected $fillable = [
        'name',
        'class_icon',
        'svg',
        'image'
    ];

    public function abillities() {
        return $this->hasMany(Abillity::class, 'category_id');
    }
}
