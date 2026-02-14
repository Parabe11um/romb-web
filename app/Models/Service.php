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
        'hero_title',
        'hero_subtitle',
        'hero_image',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function solutions()
    {
        return $this->hasMany(\App\Models\ServiceSolution::class)->orderBy('position');
    }

    public function technologies()
    {
        return $this->hasMany(\App\Models\ServiceTechnology::class)->orderBy('position');
    }

    public function steps()
    {
        return $this->hasMany(\App\Models\ServiceStep::class)->orderBy('position');
    }
}
