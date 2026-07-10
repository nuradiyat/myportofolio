<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            // Programming Language
            ['name' => 'HTML', 'category' => 'Programming Language', 'icon' => 'html5'],
            ['name' => 'CSS', 'category' => 'Programming Language', 'icon' => 'css3'],
            ['name' => 'JavaScript', 'category' => 'Programming Language', 'icon' => 'javascript'],
            ['name' => 'PHP', 'category' => 'Programming Language', 'icon' => 'php'],
            ['name' => 'Python', 'category' => 'Programming Language', 'icon' => 'python'],

            // Framework / Library
            ['name' => 'Laravel', 'category' => 'Framework', 'icon' => 'laravel'],
            ['name' => 'Filament', 'category' => 'Framework', 'icon' => 'laravel'],
            ['name' => 'Bootstrap', 'category' => 'Framework', 'icon' => 'bootstrap'],
            ['name' => 'Tailwind CSS', 'category' => 'Framework', 'icon' => 'tailwindcss'],

            // Database
            ['name' => 'MySQL', 'category' => 'Database', 'icon' => 'mysql'],

            // Tools
            ['name' => 'Git', 'category' => 'Tools', 'icon' => 'git'],
            ['name' => 'GitHub', 'category' => 'Tools', 'icon' => 'github'],
            ['name' => 'Docker', 'category' => 'Tools', 'icon' => 'docker'],
            ['name' => 'Postman', 'category' => 'Tools', 'icon' => 'postman'],
            ['name' => 'Figma', 'category' => 'Tools', 'icon' => 'figma'],
            ['name' => 'VS Code', 'category' => 'Tools', 'icon' => 'visualstudiocode'],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
