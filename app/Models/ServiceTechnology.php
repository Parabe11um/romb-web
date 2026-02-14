<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceTechnology extends Model
{
    protected $fillable = [
        'service_id',
        'name',
        'position',
    ];
}
