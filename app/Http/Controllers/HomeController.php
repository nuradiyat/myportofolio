<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use App\Models\SocialMedia;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        // =========================
        // Konfigurasi limit section
        // =========================
        $projectInitialLimit = 6;
        $certificateInitialLimit = 6;
        $experienceInitialLimit = 6;

        // =========================
        // Data utama homepage
        // =========================
        $profile = Profile::first();
        $socialMedia = SocialMedia::orderBy('display_order')->get();

        $skills = Skill::orderBy('name')->get();
        $projects = Project::latest()->get();
        $certificates = Certificate::latest()->get();
        $experiences = Experience::latest()->get();
        $testimonials = Testimonial::latest()->get();

        return view('home', [
            // =========================
            // Data section
            // =========================
            'profile' => $profile,
            'socialMedia' => $socialMedia,
            'skills' => $skills,
            'projects' => $projects,
            'certificates' => $certificates,
            'experiences' => $experiences,
            'testimonials' => $testimonials,

            // =========================
            // Statistik
            // =========================
            'projectCount' => $projects->count(),
            'certificateCount' => $certificates->count(),
            'experienceCount' => $experiences->count(),
            'skillCount' => $skills->count(),

            // =========================
            // Initial limit per section
            // =========================
            'projectInitialLimit' => $projectInitialLimit,
            'certificateInitialLimit' => $certificateInitialLimit,
            'experienceInitialLimit' => $experienceInitialLimit,

            // =========================
            // Toggle button state
            // =========================
            'hasMoreProjects' => $projects->count() > $projectInitialLimit,
            'hasMoreCertificates' => $certificates->count() > $certificateInitialLimit,
            'hasMoreExperiences' => $experiences->count() > $experienceInitialLimit,
        ]);
    }
}