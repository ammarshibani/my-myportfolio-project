<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'position_en',
        'position_ar',
        'company_en',
        'company_ar',
        'start_date',
        'end_date',
        'description_en',
        'description_ar'
    ];

protected $dates = ['start_date', 'end_date'];

// أو في Laravel 7+
protected $casts = [
    'start_date' => 'datetime',
    'end_date' => 'datetime',
];
}