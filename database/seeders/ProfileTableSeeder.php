<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    public function run()
    {
        Profile::create([
            'full_name_en' => 'Ammar Yasser Said Alshibani',
            'full_name_ar' => 'عمار ياسر سعيد الشيباني',
            'short_name_en' => 'Ammar Alshibani',
            'short_name_ar' => 'عمار الشيباني',
            'email' => 'yammar673@gmail.com',
            'phone' => '+967 777138338',
            'whatsapp' => '+967 737138338',
            'address_en' => 'Taiz, Yemen',
            'address_ar' => 'تعز، اليمن',
            'about_en' => 'Information Systems student with excellent academic record and diverse technical skills.',
            'about_ar' => 'طالب نظم معلومات ذو سجل أكاديمي ممتاز ومهارات تقنية متنوعة.',
            'birth_date' => '2000-08-28',
        ]);
    }
}