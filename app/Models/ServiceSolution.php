<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceSolution extends Model
{
    protected $fillable = [
        'service_id',
        'title',
        'description',
        'position',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
