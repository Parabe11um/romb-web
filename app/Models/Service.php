<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'excerpt',
        'content',
        'meta_title',
        'meta_description',
        'is_active',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
