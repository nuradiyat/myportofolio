<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'short_description',
        'description',
        'objective',
        'features',
        'start_date',
        'end_date',
        'status',
        'github_url',
        'demo_url',
    ];

    protected function casts(): array
    {
        return [
            'features' => 'array',
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class);
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(ProjectGallery::class);
    }
}
