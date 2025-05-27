<?php

use Illuminate\Support\Facades\App;

if (!function_exists('set_active_locale')) {
    function set_active_locale($locale)
    {
        if (in_array($locale, ['en', 'ar'])) {
            App::setLocale($locale);
            session(['locale' => $locale]);
        }
    }
}