<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'service_number' => '01',
                'title' => 'Brand Identity',
                'description' => 'Creating strong and memorable brand identities including logo design, typography, color systems, and brand guidelines.',
                'icon' => 'ri-brush-line',
            ],
            [
                'service_number' => '02',
                'title' => 'Illustration',
                'description' => 'Designing custom illustrations and creative visual assets tailored to your brand to enhance storytelling.',
                'icon' => 'ri-pen-nib-line',
            ],
            [
                'service_number' => '03',
                'title' => 'Web Design',
                'description' => 'Building modern, responsive, and visually engaging websites focused on performance, usability, and seamless user experience.',
                'icon' => 'ri-layout-line',
            ],
            [
                'service_number' => '04',
                'title' => 'Product Strategy',
                'description' => 'Helping businesses define clear product goals, user journeys, and scalable development strategies.',
                'icon' => 'ri-lightbulb-line',
            ],
            [
                'service_number' => '05',
                'title' => 'UI/UX Design',
                'description' => 'Designing intuitive user interfaces and meaningful user experiences backed by research and wireframing.',
                'icon' => 'ri-macbook-line',
            ],
            [
                'service_number' => '06',
                'title' => 'Mobile Development',
                'description' => 'Developing high-quality mobile applications for iOS and Android platforms using modern technologies.',
                'icon' => 'ri-smartphone-line',
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
