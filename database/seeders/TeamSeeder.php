<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        $assistants = [
            [
                'name' => 'Maureen L. Reidy',
                'position' => 'Senior Assistant Nurse',
                'image' => 'public/dist/img/team1',
                'bio' => 'Dedicated senior nurse with over 8 years of experience in patient care and clinical assistance.',
                'facebook_url' => 'https://facebook.com', 
                'twitter_url' => 'https://twitter.com',
                'linkedin_url' => 'https://linkedin.com',
                'is_active' => true,
            ],
            [
                'name' => 'Janelle J. Hittle',
                'position' => 'Assistant Nurse',
                'image' => 'nurse2.jpg',
                'bio' => 'Specialized in pediatric nursing and patient comfort.',
                'facebook_url' => 'https://facebook.com',
                'twitter_url' => 'https://twitter.com',
                'linkedin_url' => 'https://linkedin.com',
                'is_active' => true,
            ],
            [
                'name' => 'Michael C. Powell',
                'position' => 'Clinical Assistant',
                'image' => 'nurse3.jpg',
                'bio' => 'Highly skilled in clinical laboratory assistance and patient monitoring.',
                'facebook_url' => 'https://facebook.com',
                'twitter_url' => 'https://twitter.com',
                'linkedin_url' => 'https://linkedin.com',
                'is_active' => true,
            ],
        ];

        foreach ($assistants as $assistant) {
            Team::create($assistant);
        }
    }
}
