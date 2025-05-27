<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('admin')->group(function () {
    // Authentication Routes
    Route::get('login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminController::class, 'login']);
    Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');

    // Protected Admin Routes
    Route::middleware('auth')->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        
        // Profile Management
        Route::get('profile', [AdminController::class, 'editProfile'])->name('admin.profile.edit');
        Route::put('profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
        
        // سيتم إضافة مسارات إدارة الأقسام الأخرى هنا
        Route::delete('profile/photo', [AdminController::class, 'deletePhoto'])->name('admin.profile.delete.photo');
        Route::delete('profile/logo', [AdminController::class, 'deleteLogo'])->name('admin.profile.delete.logo');
    });
        // Projects Routes
    Route::prefix('projects')->group(function () {
        Route::get('/', [AdminController::class, 'projectsIndex'])->name('admin.projects.index');
        Route::get('/create', [AdminController::class, 'projectsCreate'])->name('admin.projects.create');
        Route::post('/', [AdminController::class, 'projectsStore'])->name('admin.projects.store');
        Route::get('/{project}', [AdminController::class, 'projectsShow'])->name('admin.projects.show'); // هذا السطر المهم
        Route::get('/{project}/edit', [AdminController::class, 'projectsEdit'])->name('admin.projects.edit');
        Route::put('/{project}', [AdminController::class, 'projectsUpdate'])->name('admin.projects.update');
        Route::delete('/{project}', [AdminController::class, 'projectsDestroy'])->name('admin.projects.destroy');
    });
        // Skills Routes
    Route::prefix('skills')->group(function () {
        Route::get('/', [AdminController::class, 'skillsIndex'])->name('admin.skills.index');
        Route::get('/create', [AdminController::class, 'skillsCreate'])->name('admin.skills.create');
        Route::post('/', [AdminController::class, 'skillsStore'])->name('admin.skills.store');
        Route::get('/{skill}', [AdminController::class, 'skillsShow'])->name('admin.skills.show');
        Route::get('/{skill}/edit', [AdminController::class, 'skillsEdit'])->name('admin.skills.edit');
        Route::put('/{skill}', [AdminController::class, 'skillsUpdate'])->name('admin.skills.update');
        Route::delete('/{skill}', [AdminController::class, 'skillsDestroy'])->name('admin.skills.destroy');
    });
        // Certificates Routes
    Route::prefix('certificates')->group(function () {
        Route::get('/', [AdminController::class, 'certificatesIndex'])->name('admin.certificates.index');
        Route::get('/create', [AdminController::class, 'certificatesCreate'])->name('admin.certificates.create');
        Route::post('/', [AdminController::class, 'certificatesStore'])->name('admin.certificates.store');
        Route::get('/{certificate}', [AdminController::class, 'certificatesShow'])->name('admin.certificates.show');
        Route::get('/{certificate}/edit', [AdminController::class, 'certificatesEdit'])->name('admin.certificates.edit');
        Route::put('/{certificate}', [AdminController::class, 'certificatesUpdate'])->name('admin.certificates.update');
        Route::delete('/{certificate}', [AdminController::class, 'certificatesDestroy'])->name('admin.certificates.destroy');
    });

    // Education Routes
    Route::prefix('educations')->group(function () {
        Route::get('/', [AdminController::class, 'educationsIndex'])->name('admin.educations.index');
        Route::get('/create', [AdminController::class, 'educationsCreate'])->name('admin.educations.create');
        Route::post('/', [AdminController::class, 'educationsStore'])->name('admin.educations.store');
        Route::get('/{education}', [AdminController::class, 'educationsShow'])->name('admin.educations.show');
        Route::get('/{education}/edit', [AdminController::class, 'educationsEdit'])->name('admin.educations.edit');
        Route::put('/{education}', [AdminController::class, 'educationsUpdate'])->name('admin.educations.update');
        Route::delete('/{education}', [AdminController::class, 'educationsDestroy'])->name('admin.educations.destroy');
    });

    // Experiences Routes
    Route::prefix('experiences')->group(function () {
        Route::get('/', [AdminController::class, 'experiencesIndex'])->name('admin.experiences.index');
        Route::get('/create', [AdminController::class, 'experiencesCreate'])->name('admin.experiences.create');
        Route::post('/', [AdminController::class, 'experiencesStore'])->name('admin.experiences.store');
        Route::get('/{experience}', [AdminController::class, 'experiencesShow'])->name('admin.experiences.show');
        Route::get('/{experience}/edit', [AdminController::class, 'experiencesEdit'])->name('admin.experiences.edit');
        Route::put('/{experience}', [AdminController::class, 'experiencesUpdate'])->name('admin.experiences.update');
        Route::delete('/{experience}', [AdminController::class, 'experiencesDestroy'])->name('admin.experiences.destroy');
    });

});