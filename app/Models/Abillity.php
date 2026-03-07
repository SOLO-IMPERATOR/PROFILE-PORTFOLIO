<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Abillity extends Model
{
    protected $fillable = [
        'name',
        'class_icon',
        'svg',
        'image',
        'level',
        'category_id'
    ];

    public function category(): BelongsTo  {
        return $this->belongsTo(CategoryAbillity::class, 'category_id');
    }
}
