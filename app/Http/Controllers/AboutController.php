<?php

namespace App\Http\Controllers;

use App\Models\Profile;

class AboutController extends Controller
{
    public function index()
    {
        return view('about', [
            'profile' => Profile::first(),
        ]);
    }
}
