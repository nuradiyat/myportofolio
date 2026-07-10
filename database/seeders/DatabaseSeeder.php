<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProfileSeeder::class,
            SkillSeeder::class,
            ProjectSeeder::class,
            ProjectGallerySeeder::class,
            CertificateSeeder::class,
            ExperienceSeeder::class,
            TestimonialSeeder::class,
            SocialMediaSeeder::class,
            ContactMessageSeeder::class,
        ]);
    }
}
