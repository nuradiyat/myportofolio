<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        Testimonial::insert([

            [
                'name' => 'Andi Saputra',
                'position' => 'Backend Developer',
                'organization' => 'ABC Technology',
                'message' => 'Memiliki kemampuan problem solving yang sangat baik.',
            ],

            [
                'name' => ' Pratama',
                'position' => 'Project Manager',
                'organization' => 'XYZ Digital',
                'message' => 'Mampu bekerja sama dalam tim dan menyelesaikan project tepat waktu.',
            ],
            [
                'name' => 'adi',
                'position' => 'Project Manager',
                'organization' => 'XYZ Digital',
                'message' => 'Mampu bekerja sama dalam tim dan menyelesaikan project tepat waktu.',
            ],
            [
                'name' => 'riyan',
                'position' => 'Project Manager',
                'organization' => 'XYZ Digital',
                'message' => 'Mampu bekerja sama dalam tim dan menyelesaikan project tepat waktu.',
            ],
            [
                'name' => 'wahyu',
                'position' => 'Project Manager',
                'organization' => 'XYZ Digital',
                'message' => 'Mampu bekerja sama dalam tim dan menyelesaikan project tepat waktu.',
            ],

        ]);
    }
}
