<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return view('projects.index', [
            'projects' => Project::latest()->paginate(9),
        ]);
    }
    
    public function show(Project $project)
    {
        $project->load([
            'skills',
            'galleries',
        ]);

        $profile = Profile::first();

        return view('projects.show', compact('project', 'profile'));
    }
}
