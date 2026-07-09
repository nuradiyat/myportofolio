<?php

namespace App\Http\Controllers;

use App\Models\Experience;

class ExperienceController extends Controller
{
    public function show(Experience $experience)
    {
        return view('experiences.show', compact('experience'));
    }
}
