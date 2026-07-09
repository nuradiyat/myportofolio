<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        return view('testimonials', [
            'testimonials' => Testimonial::latest()->paginate(9),
        ]);
    }
}