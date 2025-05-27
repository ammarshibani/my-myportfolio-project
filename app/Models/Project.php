<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

protected $fillable = [
    'title_en',
    'title_ar',
    'description_en',
    'description_ar',
    'image',
    'link',
    'date',
    'technologies',
    'category' // أضف هذا السطر
];

    protected $dates = ['date'];
}