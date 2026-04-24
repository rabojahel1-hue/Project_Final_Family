<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        $user1 = User::create([
            'name' => 'Dr. Sarah Johnson',
            'email' => 'sarah.j@example.com',
            'password' => Hash::make('password123'),
            'role' => 'Doctor',
            'image' => 'doctor1.jpg'
        ]);

        Doctor::create([
            'user_id' => $user1->id,
            'title' => 'Consultant Dentist',
            'description_1' => 'Expert in cosmetic dentistry with 10 years of experience.',
            'description_2' => 'Dr. Sarah specializes in advanced dental implants and oral surgery.',
            'education' => 'PHD in Oral Surgery - Harvard University',
            'experience' => '10 Years in Dental Clinics',
        ]);

        $user2 = User::create([
            'name' => 'Dr. Mark Smith',
            'email' => 'mark.s@example.com',
            'password' => Hash::make('password123'),
            'role' => 'Doctor',
            'image' => 'doctor2.jpg'
        ]);

        Doctor::create([
            'user_id' => $user2->id,
            'title' => 'Cardiologist',
            'description_1' => 'Heart health specialist and clinical researcher.',
            'description_2' => 'Leading expert in heart rhythm management and preventive cardiology.',
            'education' => 'Master of Cardiology - Oxford University',
            'experience' => '15 Years in General Hospitals',
        ]);

        $user3 = User::create([
            'name' => 'Dr. Emily Davis',
            'email' => 'emily.d@example.com',
            'password' => Hash::make('password123'),
            'role' => 'Doctor',
            'image' => 'doctor3.jpg'
        ]);

        Doctor::create([
            'user_id' => $user3->id,
            'title' => 'Pediatrician',
            'description_1' => 'Caring specialist for children healthcare.',
            'description_2' => 'Focused on newborn care, vaccinations, and childhood development.',
            'education' => 'MD in Pediatrics - Johns Hopkins University',
            'experience' => '8 Years in Private Pediatric Care',
        ]);

    }
}
