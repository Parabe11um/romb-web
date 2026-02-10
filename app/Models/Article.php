<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'preview_image',
        'cover_image',
        'excerpt',
        'content',
        'is_active',
        'meta_title',
        'meta_description',
    ];
}
