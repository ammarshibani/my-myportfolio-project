<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_ar',
        'issuer_en',
        'issuer_ar',
        'date',
        'image',
        'description_en',
        'description_ar'
    ];

    protected $dates = ['date'];
    
}