<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Website Portofolio',
                'thumbnail' => 'projects/portfolio.jpg',
                'short_description' => 'Website portofolio untuk menampilkan profil, pengalaman, proyek, dan sertifikat.',
                'description' => 'Website portofolio yang dikembangkan untuk menampilkan profil, pengalaman, proyek, dan sertifikat dalam satu platform yang mudah diakses.',
                'objective' => 'Membangun personal branding melalui website portofolio yang profesional dan informatif.',
                'features' => [
                    'Dashboard Admin',
                    'Manajemen Proyek',
                    'Manajemen Sertifikat',
                    'Download CV',
                ],
                'start_date' => '2026-01-01',
                'end_date' => '2026-02-10',
                'status' => 'Completed',
                'github_url' => 'https://github.com/username/portfolio',
                'demo_url' => null,
                'skills' => ['Laravel', 'PHP', 'Filament', 'Tailwind CSS', 'MySQL'],
            ],
            [
                'title' => 'Sistem Rekrutmen Karyawan',
                'thumbnail' => 'projects/rekrutmen.jpg',
                'short_description' => 'Sistem rekrutmen berbasis web untuk mengelola lowongan dan proses seleksi kandidat.',
                'description' => 'Sistem rekrutmen berbasis web yang dikembangkan untuk mengelola lowongan pekerjaan, data pelamar, dan proses seleksi kandidat secara terpusat.',
                'objective' => 'Mempermudah pengelolaan proses rekrutmen karyawan agar lebih terstruktur dan efisien.',
                'features' => [
                    'Manajemen Lowongan',
                    'Manajemen Pelamar',
                    'Status Lamaran',
                    'Dashboard Admin',
                ],
                'start_date' => '2026-02-15',
                'end_date' => null,
                'status' => 'In Progress',
                'github_url' => 'https://github.com/username/sistem-rekrutmen',
                'demo_url' => null,
                'skills' => ['Laravel', 'PHP', 'Filament', 'Tailwind CSS', 'MySQL'],
            ],
            [
                'title' => 'Sistem Manajemen Buku',
                'thumbnail' => 'projects/manajemen-buku.jpg',
                'short_description' => 'Sistem manajemen buku untuk mengelola data buku, kategori, penulis, dan penerbit.',
                'description' => 'Sistem manajemen buku yang dikembangkan untuk mempermudah pengelolaan data buku, kategori, penulis, dan penerbit dalam satu aplikasi.',
                'objective' => 'Membantu pengelolaan data buku agar lebih terstruktur dan mudah diakses.',
                'features' => [
                    'Manajemen Buku',
                    'Manajemen Kategori',
                    'Manajemen Penulis',
                    'Manajemen Penerbit',
                ],
                'start_date' => '2025-09-01',
                'end_date' => '2025-10-20',
                'status' => 'Completed',
                'github_url' => 'https://github.com/username/sistem-manajemen-buku',
                'demo_url' => null,
                'skills' => ['Laravel', 'PHP', 'Filament', 'Tailwind CSS', 'MySQL'],
            ],
            [
                'title' => 'Portal Berita',
                'thumbnail' => 'projects/portal-berita.jpg',
                'short_description' => 'Website portal berita untuk mengelola dan menampilkan artikel secara terstruktur.',
                'description' => 'Website portal berita yang dikembangkan untuk mengelola artikel, kategori berita, dan publikasi konten secara terstruktur.',
                'objective' => 'Membantu pengelolaan dan publikasi berita secara online dengan lebih efisien.',
                'features' => [
                    'Manajemen Artikel',
                    'Manajemen Kategori',
                    'Publikasi Berita',
                    'Dashboard Admin',
                ],
                'start_date' => '2025-11-01',
                'end_date' => '2025-12-15',
                'status' => 'Completed',
                'github_url' => 'https://github.com/username/portal-berita',
                'demo_url' => null,
                'skills' => ['Laravel', 'PHP', 'Filament', 'Tailwind CSS', 'MySQL'],
            ],
            [
                'title' => 'Sistem Pendukung Keputusan Penerima Bonus Karyawan',
                'thumbnail' => 'projects/spk-bonus-karyawan.jpg',
                'short_description' => 'Sistem pendukung keputusan untuk membantu penentuan penerima bonus karyawan.',
                'description' => 'Sistem pendukung keputusan yang dikembangkan untuk membantu proses penentuan penerima bonus karyawan menggunakan metode Simple Additive Weighting (SAW).',
                'objective' => 'Membantu proses penilaian bonus karyawan agar lebih cepat, terstruktur, dan konsisten.',
                'features' => [
                    'Manajemen Data Karyawan',
                    'Manajemen Kriteria dan Bobot',
                    'Perhitungan Metode SAW',
                    'Hasil Perangkingan',
                ],
                'start_date' => '2025-05-01',
                'end_date' => '2025-06-15',
                'status' => 'Completed',
                'github_url' => 'https://github.com/username/spk-bonus-karyawan',
                'demo_url' => null,
                'skills' => ['Laravel', 'PHP', 'MySQL'],
            ],
            [
                'title' => 'Website Bio Link',
                'thumbnail' => 'projects/bio-link.jpg',
                'short_description' => 'Website Bio Link untuk mengelola berbagai tautan dalam satu halaman.',
                'description' => 'Website Bio Link yang dikembangkan untuk mengelola berbagai tautan dalam satu halaman dengan fitur pengelolaan tautan dan pemantauan jumlah klik.',
                'objective' => 'Memudahkan pengelolaan dan akses berbagai tautan dalam satu halaman yang ringkas.',
                'features' => [
                    'Manajemen Tautan',
                    'Dashboard Admin',
                    'Click Analytics',
                    'Tampilan Responsif',
                ],
                'start_date' => '2025-03-01',
                'end_date' => '2025-04-10',
                'status' => 'Completed',
                'github_url' => 'https://github.com/username/bio-link',
                'demo_url' => null,
                'skills' => ['Laravel', 'PHP', 'Filament', 'Tailwind CSS', 'MySQL'],
            ],
        ];

        foreach ($projects as $item) {
            $project = Project::updateOrCreate(
                ['slug' => Str::slug($item['title'])],
                [
                    'title' => $item['title'],
                    'thumbnail' => $item['thumbnail'],
                    'short_description' => $item['short_description'],
                    'description' => $item['description'],
                    'objective' => $item['objective'],
                    'features' => $item['features'],
                    'start_date' => $item['start_date'],
                    'end_date' => $item['end_date'],
                    'status' => $item['status'],
                    'github_url' => $item['github_url'],
                    'demo_url' => $item['demo_url'],
                ]
            );

            $skillIds = Skill::whereIn('name', $item['skills'])->pluck('id');
            $project->skills()->sync($skillIds);
        }
    }
}
