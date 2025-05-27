<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Profile;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // مشاركة بيانات الملف الشخصي مع جميع العروض
    View::composer('*', function ($view) {
        $view->with('profile', \App\Models\Profile::firstOrNew());
    });

        // تعريف مسارات لوحة التحكم
        $this->mapAdminRoutes();
    }

    /**
     * تعريف مسارات لوحة التحكم
     */
    protected function mapAdminRoutes(): void
    {
        Route::prefix('admin')
            ->middleware('web')
            ->namespace('App\Http\Controllers') // تأكد من وجود هذا
            ->group(function () {
                Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');
                // Authentication Routes
                Route::get('login', 'App\Http\Controllers\AdminController@showLoginForm')->name('admin.login');
                Route::post('login', 'App\Http\Controllers\AdminController@login');
                Route::post('logout', 'App\Http\Controllers\AdminController@logout')->name('admin.logout');

                // Protected Admin Routes
                Route::middleware('auth')->group(function () {
                    Route::get('dashboard', 'App\Http\Controllers\AdminController@dashboard')->name('admin.dashboard');
                    
                    // Profile Management
                    Route::get('profile', 'App\Http\Controllers\AdminController@editProfile')->name('admin.profile.edit');
                    Route::put('profile', 'App\Http\Controllers\AdminController@updateProfile')->name('admin.profile.update');
                    
                    // يمكن إضافة مسارات إدارة الأقسام الأخرى هنا
                });
            });
    }
}