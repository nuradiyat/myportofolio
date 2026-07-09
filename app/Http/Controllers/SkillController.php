<?php

namespace App\Http\Controllers;

use App\Models\Skill;

class SkillController extends Controller
{
    public function index()
    {
        return view('skills', [
            'skills' => Skill::orderBy('category')->get(),
        ]);
    }
}
