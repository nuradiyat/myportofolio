<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        Profile::updateOrCreate(
            [
                'full_name' => 'Muhammad Nuradiyat',
            ],
            [
                'profession' => 'Web Developer',
                'profile_photo' => 'profiles/profile.jpg',
                'logo_website' => 'logo/logo.png',
                'cv_file' => 'cv/muhammad-nuradiyat-cv.pdf',
                'short_bio' => 'Membangun website dan aplikasi web yang modern, terstruktur, dan nyaman digunakan.',
                'about' => 'Berfokus pada pengembangan website dan aplikasi web dari sisi tampilan hingga fungsionalitas, dengan pendekatan yang terstruktur, efisien, dan berorientasi pada kebutuhan pengguna. Menghadirkan solusi digital yang tidak hanya berjalan dengan baik, tetapi juga memiliki tampilan profesional, alur yang jelas, serta pengelolaan sistem yang rapi agar memberikan pengalaman yang nyaman dan nilai yang nyata.',
            ]
        );
    }
}