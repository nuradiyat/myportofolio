<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use Illuminate\Database\Seeder;

class ContactMessageSeeder extends Seeder
{
    public function run(): void
    {
        ContactMessage::insert([

            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'subject' => 'Kerja Sama',
                'message' => 'Halo, saya tertarik bekerja sama dengan Anda.',
            ],

            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'subject' => 'Freelance Project',
                'message' => 'Apakah Anda tersedia untuk proyek freelance?',
            ],

        ]);
    }
}
