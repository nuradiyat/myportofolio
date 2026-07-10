<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectGallery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectGallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleries = [
            'Website Portofolio' => [
                [
                    'image' => 'projects/portfolio/gallery-1.jpg',
                    'caption' => 'Halaman Beranda',
                ],
                [
                    'image' => 'projects/portfolio/gallery-2.jpg',
                    'caption' => 'Dashboard Admin',
                ],
                [
                    'image' => 'projects/portfolio/gallery-3.jpg',
                    'caption' => 'Halaman Detail Proyek',
                ],
            ],

            'Sistem Rekrutmen Karyawan' => [
                [
                    'image' => 'projects/rekrutmen/gallery-1.jpg',
                    'caption' => 'Halaman Lowongan',
                ],
                [
                    'image' => 'projects/rekrutmen/gallery-2.jpg',
                    'caption' => 'Dashboard Admin',
                ],
            ],

            'Sistem Manajemen Buku' => [
                [
                    'image' => 'projects/manajemen-buku/gallery-1.jpg',
                    'caption' => 'Halaman Data Buku',
                ],
                [
                    'image' => 'projects/manajemen-buku/gallery-2.jpg',
                    'caption' => 'Dashboard Admin',
                ],
            ],

            'Portal Berita' => [
                [
                    'image' => 'projects/portal-berita/gallery-1.jpg',
                    'caption' => 'Halaman Berita',
                ],
                [
                    'image' => 'projects/portal-berita/gallery-2.jpg',
                    'caption' => 'Dashboard Admin',
                ],
            ],

            'Sistem Pendukung Keputusan Penerima Bonus Karyawan' => [
                [
                    'image' => 'projects/spk-bonus-karyawan/gallery-1.jpg',
                    'caption' => 'Halaman Data Karyawan',
                ],
                [
                    'image' => 'projects/spk-bonus-karyawan/gallery-2.jpg',
                    'caption' => 'Hasil Perangkingan',
                ],
            ],

            'Website Bio Link' => [
                [
                    'image' => 'projects/bio-link/gallery-1.jpg',
                    'caption' => 'Halaman Bio Link',
                ],
                [
                    'image' => 'projects/bio-link/gallery-2.jpg',
                    'caption' => 'Dashboard Admin',
                ],
            ],
        ];

        foreach ($galleries as $projectTitle => $items) {
            $project = Project::where('slug', Str::slug($projectTitle))->first();

            if (! $project) {
                continue;
            }

            foreach ($items as $item) {
                ProjectGallery::updateOrCreate(
                    [
                        'project_id' => $project->id,
                        'image' => $item['image'],
                    ],
                    [
                        'caption' => $item['caption'],
                    ]
                );
            }
        }
    }
}
