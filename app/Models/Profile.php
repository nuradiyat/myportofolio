<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /** @use HasFactory<\Database\Factories\ProfileFactory> */
    use HasFactory;

    protected $fillable = [
        'full_name',
        'profession',
        'profile_photo',
        'logo_website',
        'cv_file',
        'short_bio',
        'about',
    ];
}
