<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
public function index()
{
    $projects = Project::orderBy('date', 'desc')->get()->map(function($project) {
        $project->date = \Carbon\Carbon::parse($project->date);
        return $project;
    });
    
    $categories = Project::select('category')->distinct()->pluck('category');
    
    return view('projects', compact('projects', 'categories'));
}
}