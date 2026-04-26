<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Project;
class ProjectTag extends Model
{
    protected $fillable = [
        'name',
        'name_en',
    ];

    public function getLocalizedName(): string
    {
        if (app()->getLocale() === 'en' && $this->name_en) {
            return $this->name_en;
        }
        return $this->name;
    }

    public function projects(): BelongsToMany{
        return $this->belongsToMany(
            Project::class,
            'project_project_tag',
            'project_tag_id',
            'project_id'
            );
    }

}
