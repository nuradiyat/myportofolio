<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $experiences = [
            [
                'organization' => 'Himpunan Mahasiswa Sistem Informasi',
                'position' => 'Koordinator Divisi Pendidikan',
                'image' => 'experience/himsi.png',
                'type' => 'Organization',
                'start_date' => '2025-01-01',
                'end_date' => '2026-12-31',
                'description' => 'Mengelola program kerja Divisi Pendidikan, mengoordinasikan kegiatan, dan melakukan evaluasi untuk mendukung pengembangan akademik mahasiswa.',
            ],
            [
                'organization' => 'Himpunan Mahasiswa Sistem Informasi',
                'position' => 'Ketua HIMSI Smart Fest',
                'image' => 'experience/himsi.png',
                'type' => 'Committee',
                'start_date' => '2026-01-01',
                'end_date' => '2026-12-31',
                'description' => 'Memimpin perencanaan dan pelaksanaan HIMSI Smart Fest serta mengoordinasikan panitia agar kegiatan berjalan dengan baik.',
            ],
            [
                'organization' => 'Himpunan Mahasiswa Sistem Informasi',
                'position' => 'Anggota Divisi Pendidikan',
                'image' => 'experience/himsi.png',
                'type' => 'Organization',
                'start_date' => '2024-01-01',
                'end_date' => '2025-12-31',
                'description' => 'Mendukung kegiatan Divisi Pendidikan serta ikut berkontribusi dalam evaluasi dan pengembangan program kerja.',
            ],
            [
                'organization' => 'Himpunan Mahasiswa Sistem Informasi',
                'position' => 'Pemateri Kelas Coding Python',
                'image' => 'experience/himsi.png',
                'type' => 'Teaching',
                'start_date' => '2024-01-01',
                'end_date' => '2024-12-31',
                'description' => 'Menyusun materi, menjelaskan dasar-dasar Python, dan membimbing peserta dalam praktik coding.',
            ],
        ];

        foreach ($experiences as $item) {
            Experience::updateOrCreate(
                [
                    'organization' => $item['organization'],
                    'position' => $item['position'],
                ],
                [
                    'image' => $item['image'],
                    'type' => $item['type'],
                    'start_date' => $item['start_date'],
                    'end_date' => $item['end_date'],
                    'description' => $item['description'],
                ]
            );
        }
    }
}
