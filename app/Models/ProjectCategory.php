<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Project;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProjectCategory extends Model
{
    protected $fillable = [
        'name'
    ];

    public function projects(): BelongsToMany{
        return $this->belongsToMany(
            Project::class,
             'category_project',
                    'category_project_id',
                    'project_id'
             );
    }
}
