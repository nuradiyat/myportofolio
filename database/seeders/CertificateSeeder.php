<?php

namespace Database\Seeders;

use App\Models\Certificate;
use Illuminate\Database\Seeder;

class CertificateSeeder extends Seeder
{
    public function run(): void
    {
        $certificates = [
            [
                'title' => 'Database Administrator',
                'issuer' => 'BNSP',
                'thumbnail' => 'certificates/database-administrator.jpg',
                'certificate_number' => 'BNSP-2026-001',
                'issue_year' => 2026,
                'credential_url' => null,
                'expired_at' => '2029-12-31',
                'description' => 'Sertifikasi kompetensi di bidang administrasi basis data.',
                'pdf_file' => 'certificates/database-administrator.pdf',
            ],
            [
                'title' => 'Belajar Dasar Artificial Intelligence',
                'issuer' => 'Dicoding Indonesia',
                'thumbnail' => 'certificates/dasar-artificial-intelligence.jpg',
                'certificate_number' => null,
                'issue_year' => 2025,
                'credential_url' => null,
                'expired_at' => null,
                'description' => 'Sertifikat pembelajaran dasar Artificial Intelligence.',
                'pdf_file' => 'certificates/dasar-artificial-intelligence.pdf',
            ],
            [
                'title' => 'Google Cloud Roadshow × Build with AI Bogor',
                'issuer' => 'Certificate of Attendance',
                'thumbnail' => 'certificates/build-with-ai-bogor.jpg',
                'certificate_number' => null,
                'issue_year' => 2025,
                'credential_url' => null,
                'expired_at' => null,
                'description' => 'Sertifikat kehadiran pada kegiatan Google Cloud Roadshow × Build with AI Bogor.',
                'pdf_file' => 'certificates/build-with-ai-bogor.pdf',
            ],
        ];

        foreach ($certificates as $item) {
            Certificate::updateOrCreate(
                [
                    'title' => $item['title'],
                    'issuer' => $item['issuer'],
                ],
                [
                    'thumbnail' => $item['thumbnail'],
                    'certificate_number' => $item['certificate_number'],
                    'issue_year' => $item['issue_year'],
                    'credential_url' => $item['credential_url'],
                    'expired_at' => $item['expired_at'],
                    'description' => $item['description'],
                    'pdf_file' => $item['pdf_file'],
                ]
            );
        }
    }
}
