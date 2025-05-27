<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Certificate;
use App\Models\Experience;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $educations = Education::orderBy('start_date', 'desc')->get();
        $skills = Skill::orderBy('percentage', 'desc')->get();
        $projects = Project::orderBy('date', 'desc')->get();
        $certificates = Certificate::orderBy('date', 'desc')->get();
        $experiences = Experience::orderBy('start_date', 'desc')->get();

        return view('home', compact(
            'profile',
            'educations',
            'skills',
            'projects',
            'certificates',
            'experiences'
        ));
    }
}