<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = [
        'original_name',
        'filename',
        'path',
        'size',
        'status',
        'analysis',
    ];

    protected $casts = [
        'analysis' => 'array',
    ];
}