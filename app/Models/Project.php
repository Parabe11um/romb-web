<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'preview_image',
        'detail_image',
        'excerpt',
        'content',
        'meta_title',
        'meta_description',
        'is_active',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    protected $with = ['images'];

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function getPreviewImageUrlAttribute(): ?string
    {
        return $this->preview_image
            ? asset('storage/' . $this->preview_image)
            : null;
    }

    public function getDetailImageUrlAttribute(): ?string
    {
        return $this->detail_image
            ? asset('storage/' . $this->detail_image)
            : null;
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class)->orderBy('position');
    }
}

