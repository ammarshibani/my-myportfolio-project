<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function __invoke(Request $request, $locale)
    {
        // 1. التحقق من صحة اللغة المطلوبة
        if (!in_array($locale, ['en', 'ar'])) {
            return back()->with('error', 'Language not supported');
        }

        // 2. حفظ اللغة في الجلسة
        Session::put('locale', $locale);
        
        // 3. تعيين اللغة الحالية للتطبيق
        App::setLocale($locale);
        
        // 4. إعادة التوجيه مع رسالة نجاح
        return back()->with('success', 'Language changed successfully');
    }
}