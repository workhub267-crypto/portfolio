<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'E-Commerce Platform',
                'slug' => Str::slug('E-Commerce Platform'),
                'description' => 'A full-featured e-commerce solution with product management, cart, and payment integration.',
                'tech_stack' => 'Laravel, Vue.js, MySQL',
                'github_link' => 'https://github.com',
                'live_link' => 'https://example.com',
                'image' => 'projects/ecommerce.png',
                'status' => 'completed',
            ],
            [
                'title' => 'Portfolio Website',
                'slug' => Str::slug('Portfolio Website'),
                'description' => 'A premium portfolio website designed for creative professionals.',
                'tech_stack' => 'Laravel, HTML5, CSS3',
                'github_link' => 'https://github.com',
                'live_link' => 'https://example.com',
                'image' => 'projects/portfolio.png',
                'status' => 'completed',
            ],
            [
                'title' => 'Task Management App',
                'slug' => Str::slug('Task Management App'),
                'description' => 'A real-time task management application for teams.',
                'tech_stack' => 'Laravel, Livewire, Alpine.js',
                'github_link' => 'https://github.com',
                'live_link' => 'https://example.com',
                'image' => 'projects/task_app.png',
                'status' => 'ongoing',
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
