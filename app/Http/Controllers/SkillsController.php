<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Profile; 
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('percentage', 'desc')->get();
        $categories = Skill::select('category')->distinct()->pluck('category');
        $profile = Profile::first(); // جلب بيانات الملف الشخصي
        return view('skills', compact('skills', 'categories'));
    }
}