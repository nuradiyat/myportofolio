<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    public function run(): void
    {
        SocialMedia::insert([

            [
                'platform' => 'GitHub',
                'url' => 'https://github.com/nuradiyat',
                'icon' => 'github',
                'display_order' => 1,
            ],

            [
                'platform' => 'LinkedIn',
                'url' => 'https://linkedin.com/in/muhammadnuradiyat',
                'icon' => 'linkedin',
                'display_order' => 2,
            ],

            [
                'platform' => 'WhatsApp',
                'url' => 'https://wa.me/6289507922897',
                'icon' => 'whatsapp ',
                'display_order' => 3,
            ],

            // email
            [
                'platform' => 'Email',
                'url' => 'mailto:nuradiyat@gmail.com',
                'icon' => 'email',
                'display_order' => 4,
            ],

            [
                'platform' => 'Instagram',
                'url' => 'https://instagram.com/mnuradiyat',
                'icon' => 'instagram',
                'display_order' => 5,
            ],

        ]);
    }
}
