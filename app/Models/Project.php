<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\ProjectCategory;
use App\Models\ProjectTag;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'url',
        'gallery',
        'class-icon',
        'category_id'
    ];

    protected $casts = [
        'gallery' => 'array'
    ];

    public function category() : BelongsTo {
       return $this->belongsTo(ProjectCategory::class,'category_id');
    }

    public function tags(): BelongsToMany{
        return $this->belongsToMany(
            ProjectTag::class,
            'project_project_tag',
            'project_id',
            'project_tag_id'
        );
    }
}
