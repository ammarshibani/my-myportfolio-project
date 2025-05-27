<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Skill;

class AboutController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
    $experiences = Experience::orderBy('start_date', 'desc')->get()
        ->map(function ($exp) {
            $exp->start_date = \Carbon\Carbon::parse($exp->start_date);
            $exp->end_date = $exp->end_date ? \Carbon\Carbon::parse($exp->end_date) : null;
            return $exp;
        });
        $educations = Education::orderBy('start_date', 'desc')->get();
        $skills = Skill::orderBy('percentage', 'desc')->get();
        
        $interests = [
            ['name' => 'Programming', 'icon' => 'fas fa-code'],
            ['name' => 'Reading', 'icon' => 'fas fa-book'],
            ['name' => 'Traveling', 'icon' => 'fas fa-plane'],
            ['name' => 'Photography', 'icon' => 'fas fa-camera'],
            ['name' => 'Music', 'icon' => 'fas fa-music'],
            ['name' => 'Sports', 'icon' => 'fas fa-futbol'],
        ];

        return view('about', compact('profile', 'experiences', 'educations', 'skills', 'interests'));
    }
}