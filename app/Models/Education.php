<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $table = 'educations'; // أضف هذا السطر

    protected $fillable = [
        'degree_en',
        'degree_ar',
        'institution_en',
        'institution_ar',
        'field_en',
        'field_ar',
        'start_date',
        'end_date',
        'description_en',
        'description_ar',
        'grade',
        'position'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}