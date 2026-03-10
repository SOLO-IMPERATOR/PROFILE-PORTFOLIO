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
        'class_icon',
        'background',
        'category_id'
    ];

    protected $casts = [
        'gallery' => 'array'
    ];

    public function category() : BelongsToMany {
       return $this->belongsToMany(ProjectCategory::class,
       'category_project',
       'project_id',
       'category_project_id'
       );
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
