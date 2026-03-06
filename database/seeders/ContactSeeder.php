<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        $messages = [
            [
                'name' => 'Alice Johnson',
                'email' => 'alice@example.com',
                'subject' => 'Inquiry about Web Design',
                'message' => 'Hello, I am interested in your web design services for my new startup. Could you please send me your pricing details?',
                'is_read' => false,
            ],
            [
                'name' => 'Bob Smith',
                'email' => 'bob@company.com',
                'subject' => 'Partnership Opportunity',
                'message' => 'We saw your portfolio and are very impressed. We would like to discuss a potential partnership for future mobile app projects.',
                'is_read' => false,
            ],
            [
                'name' => 'Charlie Rose',
                'email' => 'charlie@design.io',
                'subject' => 'Great Work!',
                'message' => 'Just wanted to say that your recent project on the E-Commerce platform is absolute fire. Keep it up!',
                'is_read' => true,
            ]
        ];

        foreach ($messages as $message) {
            Contact::create($message);
        }
    }
}
