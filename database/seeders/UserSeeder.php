<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@mnuradiyatdev.com'],
            [
                'name' => 'Muhammad Nuradiyat',
                'email' => 'admin@mnuradiyatdev.com',
                'password' => Hash::make('@code'),
                'email_verified_at' => now(),
            ]
        );
    }
}
