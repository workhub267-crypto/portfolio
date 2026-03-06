<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'John Doe',
                'designation' => 'CEO, TechX',
                'message' => 'Working with this team was a game-changer for our digital presence. Their attention to detail is unmatched.',
                'client_image' => null,
                'sort_order' => 1,
            ],
            [
                'client_name' => 'Jane Smith',
                'designation' => 'Creative Director, Bloom',
                'message' => 'The UI/UX design they provided was exactly what we needed to improve our user retention rate.',
                'client_image' => null,
                'sort_order' => 2,
            ],
            [
                'client_name' => 'Michael Brown',
                'designation' => 'Founder, StartupY',
                'message' => 'Fast delivery, excellent communication, and a very high-quality codebase. Highly recommended!',
                'client_image' => null,
                'sort_order' => 3,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
