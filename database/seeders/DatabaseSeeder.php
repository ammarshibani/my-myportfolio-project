<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Certificate;
use App\Models\Experience;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. بيانات الملف الشخصي (Profile)
        Profile::create([
            'full_name_en'   => 'Ammar Yasser Said Alshibani',
            'full_name_ar'   => 'عمار ياسر سعيد الشيباني',
            'short_name_en'  => 'Ammar Alshibani',
            'short_name_ar'  => 'عمار الشيباني',
            'email'          => 'yammar673@gmail.com',
            'phone'          => '+967 777138338',
            'whatsapp'       => '+967 737138338',
            'address_en'     => 'Taiz, Yemen',
            'address_ar'     => 'تعز، اليمن',
            'about_en'       => 'Information Systems student with excellent academic record and diverse technical skills.',
            'about_ar'       => 'طالب نظم معلومات ذو سجل أكاديمي ممتاز ومهارات تقنية متنوعة.',
            'birth_date'     => '2000-08-28',
            'photo'         => null,
            'logo'          => null,
        ]);

        // 2. بيانات التعليم (Education)
        Education::create([
            'degree_en'      => 'Bachelor\'s Degree of Information System',
            'degree_ar'      => 'بكالوريوس نظم المعلومات',
            'institution_en' => 'Alrazi University',
            'institution_ar' => 'جامعة الرازي',
            'field_en'       => 'Information Systems',
            'field_ar'       => 'نظم المعلومات',
            'start_date'     => '2021-03-01',
            'end_date'       => null,
            'description_en' => 'Obtaining a grade of 91 out of 100 in the first university year. Obtaining fourth place in the second university year with a grade of 92 out of 100. Obtaining third place in the third university year with a grade of 85 out of 100.',
            'description_ar' => 'الحصول على درجة 91 من 100 في السنة الجامعية الأولى. الحصول على المركز الرابع في السنة الجامعية الثانية بدرجة 92 من 100. الحصول على المركز الثالث في السنة الجامعية الثالثة بدرجة 85 من 100.',
            'grade'          => '91/100',
            'position'      => 4,
        ]);

        // 3. بيانات المهارات (Skills)
        $skills = [
            [
                'name_en' => 'HTML/CSS', 
                'name_ar' => 'HTML/CSS', 
                'percentage' => 90, 
                'category' => 'Web Development',
                'icon' => 'fab fa-html5'
            ],
            [
                'name_en' => 'JavaScript', 
                'name_ar' => 'جافاسكريبت', 
                'percentage' => 85, 
                'category' => 'Web Development',
                'icon' => 'fab fa-js'
            ],
            [
                'name_en' => 'PHP', 
                'name_ar' => 'PHP', 
                'percentage' => 80, 
                'category' => 'Web Development',
                'icon' => 'fab fa-php'
            ],
            [
                'name_en' => 'C#', 
                'name_ar' => 'سي شارب', 
                'percentage' => 75, 
                'category' => 'Programming Languages',
                'icon' => 'fas fa-code'
            ],
            [
                'name_en' => 'Python', 
                'name_ar' => 'بايثون', 
                'percentage' => 70, 
                'category' => 'Programming Languages',
                'icon' => 'fab fa-python'
            ],
            [
                'name_en' => 'Flutter', 
                'name_ar' => 'فلاتر', 
                'percentage' => 65, 
                'category' => 'Mobile Development',
                'icon' => 'fas fa-mobile'
            ],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        // 4. بيانات المشاريع (Projects)
        $projects = [
            [
                'title_en' => 'Our Library Website KUU',
                'title_ar' => 'موقع مكتبتنا KUU',
                'description_en' => 'A local library management website developed with PHP and MySQL',
                'description_ar' => 'موقع لإدارة المكتبة المحلية باستخدام PHP و MySQL',
                'image' => 'library.jpg',
                'date' => '2022-10-01',
                'technologies' => 'PHP, MySQL, Bootstrap',
                'link' => '#'
            ],
            [
                'title_en' => 'Omdat Alinjaz Website',
                'title_ar' => 'موقع عمدت الإنجاز',
                'description_en' => 'Website for public services with online forms and dashboard',
                'description_ar' => 'موقع للخدمات العامة يحتوي على نماذج إلكترونية ولوحة تحكم',
                'image' => 'omdat.jpg',
                'date' => '2023-09-01',
                'technologies' => 'PHP, JavaScript, jQuery',
                'link' => '#'
            ],
            [
                'title_en' => 'Number Systems Converter',
                'title_ar' => 'محول أنظمة الأعداد',
                'description_en' => 'Desktop application for converting between different number systems',
                'description_ar' => 'تطبيق سطح مكتب لتحويل بين أنظمة الأعداد المختلفة',
                'image' => 'converter.jpg',
                'date' => '2021-09-01',
                'technologies' => 'C#, .NET Framework',
                'link' => '#'
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }

        // 5. بيانات الشهادات (Certificates)
        $certificates = [
            [
                'name_en' => 'Symposium on Cyber Vulnerabilities',
                'name_ar' => 'ندوة الثغرات السيبرانية',
                'issuer_en' => 'Yemeni ICT Union & IEEE Yemen',
                'issuer_ar' => 'اتحاد تقنية المعلومات والاتصالات اليمني و IEEE اليمن',
                'date' => '2023-08-01',
                'image' => 'cyber.jpg',
                'description_en' => 'Symposium on cyber vulnerabilities and methods of protection from them',
                'description_ar' => 'ندوة حول الثغرات السيبرانية وطرق الحماية منها'
            ],
            [
                'name_en' => 'Web Development Bootcamp',
                'name_ar' => 'معسكر تطوير الويب',
                'issuer_en' => 'Alrazi University',
                'issuer_ar' => 'جامعة الرازي',
                'date' => '2022-05-15',
                'image' => 'webdev.jpg',
                'description_en' => 'Intensive training on web development technologies',
                'description_ar' => 'تدريب مكثف على تقنيات تطوير الويب'
            ],
        ];

        foreach ($certificates as $certificate) {
            Certificate::create($certificate);
        }

        // 6. بيانات الخبرات (Experiences)
        $experiences = [
            [
                'position_en' => 'IT Support Intern',
                'position_ar' => 'متدرب دعم فني',
                'company_en' => 'Alrazi University',
                'company_ar' => 'جامعة الرازي',
                'start_date' => '2022-06-01',
                'end_date' => '2022-09-01',
                'description_en' => 'Provided technical support to staff and students, maintained computer labs, and assisted in network administration.',
                'description_ar' => 'توفير الدعم الفني للطلاب والموظفين، صيانة معامل الحاسوب، والمساعدة في إدارة الشبكة.'
            ],
            [
                'position_en' => 'Freelance Web Developer',
                'position_ar' => 'مطور ويب مستقل',
                'company_en' => 'Self-employed',
                'company_ar' => 'عمل حر',
                'start_date' => '2021-01-01',
                'end_date' => null,
                'description_en' => 'Developing websites and web applications for various clients using modern technologies.',
                'description_ar' => 'تطوير مواقع وتطبيقات ويب لعملاء مختلفين باستخدام التقنيات الحديثة.'
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::create($experience);
        }

        // 7. إنشاء مستخدم مسؤول
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
        ]);
    }
}