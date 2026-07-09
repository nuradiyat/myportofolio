<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    /** @use HasFactory<\Database\Factories\SocialMediaFactory> */
    use HasFactory;

    protected $fillable = [
        'platform',
        'url',
        'icon',
        'display_order',
    ];

    
}
