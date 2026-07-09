<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    /** @use HasFactory<\Database\Factories\CertificateFactory> */
    use HasFactory;

    protected $fillable = [
        'thumbnail',
        'title',
        'issuer',
        'certificate_number',
        'issue_year',
        'credential_url',
        'expired_at',
        'description',
        'pdf_file',
    ];

    protected function casts(): array
    {
        return [
            'expired_at' => 'date',
        ];
    }
}
