<?php

namespace App\Http\Controllers;

use App\Models\Certificate;

class CertificateController extends Controller
{
    public function index()
    {
        return view('certificates', [
            'certificates' => Certificate::latest()->paginate(9),
        ]);
    }
}
