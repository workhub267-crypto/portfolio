<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        About::updateOrCreate(
            ['id' => 1],
            [
                'title' => "Hello, I'm Om Jasoliya",
                'subtitle' => "Laravel Developer\nBackend Specialist\nBased In Surat, India",

                'description' => "I am a passionate and dedicated Laravel developer with a strong foundation in backend development and database design.
I have hands-on experience working with PHP, Laravel, MySQL, AJAX, jQuery, REST APIs, and MVC architecture. I enjoy building scalable, secure, and high-performance web applications.
During my training and project work, I developed dynamic CRUD systems, authentication modules, role-based access control, and responsive dashboards using modern web technologies.
I focus on writing clean, maintainable, and well-structured code following industry best practices. I am comfortable working with Eloquent ORM, migrations, API integrations, and debugging real-world application issues.
Beyond coding, I continuously improve my skills by learning new technologies, exploring system architecture concepts, and practicing problem-solving. My goal is to grow as a full-stack developer and contribute to impactful, real-world projects.
I am always open to learning opportunities, collaboration, and building innovative solutions that create value.",

                'profile_image' => 'about/profile.jpg',
                'resume_file' => 'about/resume.pdf',
                'experience_years' => 2,
            ]
        );
    }
}