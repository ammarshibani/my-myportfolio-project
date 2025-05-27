<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name_en',
        'full_name_ar',
        'short_name_en',
        'short_name_ar',
        'email',
        'phone',
        'whatsapp',
        'address_en',
        'address_ar',
        'about_en',
        'about_ar',
        'birth_date',
        'photo',
        'logo'
    ];

    protected $dates = ['birth_date'];
}