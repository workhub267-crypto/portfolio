<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            [
                'skill_name' => 'PHP / Laravel',
                'category' => 'Backend',
                'proficiency' => 90,
            ],
            [
                'skill_name' => 'JavaScript / Vue.js',
                'category' => 'Frontend',
                'proficiency' => 85,
            ],
            [
                'skill_name' => 'HTML5 / CSS3',
                'category' => 'Frontend',
                'proficiency' => 95,
            ],
            [
                'skill_name' => 'MySQL / PostgreSQL',
                'category' => 'Database',
                'proficiency' => 80,
            ],
            [
                'skill_name' => 'Git / GitHub',
                'category' => 'DevOps',
                'proficiency' => 88,
            ],
            [
                'skill_name' => 'Responsive Design',
                'category' => 'Design',
                'proficiency' => 92,
            ],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
