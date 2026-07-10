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
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Muhammad Nuradiyat',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'email_verified_at' => now(),
            ]
        );
    }
}
