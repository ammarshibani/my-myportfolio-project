<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CertificatesController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/theme/switch', ThemeController::class)->name('theme.switch');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
// Route::get('/language/{locale}', LanguageController::class)
//     ->name('language.switch')
//     ->where('locale', 'en|ar');
Route::get('/language/{locale}', [LanguageController::class, '__invoke'])->name('language.switch')->where('locale', 'en|ar');
Route::get('/skills', [SkillsController::class, 'index'])->name('skills');
Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/certificates', [CertificatesController::class, 'index'])->name('certificates');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

