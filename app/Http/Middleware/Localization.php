<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Localization
{
    public function handle(Request $request, Closure $next)
    {
        // 1. التحقق من وجود اللغة في الجلسة وتطبيقها
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        }

        // 2. تمرير الطلب إلى الخطوة التالية
        $response = $next($request);

        // 3. التأكد من تعيين اللغة في الـ response
        $response->headers->set('Content-Language', App::getLocale());

        return $response;
    }
}