<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Doctor;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $doctorIds = Doctor::pluck('id')->toArray();
        if (empty($doctorIds)) {
            return;
        }

        $services = [
            [
                'name' => 'Consultation',
                'description' => 'Professional medical advice and primary health assessment.',
                'duration' => 20,
                'price' => 50.00,
                'doctor_id' => $doctorIds[array_rand($doctorIds)] // يختار طبيب عشوائي من الموجودين
            ],
            [
                'name' => 'Health Checkup',
                'description' => 'Comprehensive physical examination for wellness.',
                'duration' => 30,
                'price' => 30.00,
                'doctor_id' => $doctorIds[array_rand($doctorIds)]
            ],
            [
                'name' => 'Flu Shots',
                'description' => 'Seasonal influenza vaccinations.',
                'duration' => 10,
                'price' => 15.00,
                'doctor_id' => $doctorIds[array_rand($doctorIds)]
            ],
            [
                'name' => 'Blood Test',
                'description' => 'Precise laboratory analysis of blood samples.',
                'duration' => 30,
                'price' => 10.00,
                'doctor_id' => $doctorIds[array_rand($doctorIds)]
            ],
            [
                'name' => 'Physical Exams',
                'description' => 'Detailed clinical evaluation of bodily functions.',
                'duration' => 30,
                'price' => 50.00,
                'doctor_id' => $doctorIds[array_rand($doctorIds)]
            ],
            [
                'name' => 'Prevention',
                'description' => 'Preventive care strategies and screenings.',
                'duration' => 10,
                'price' => 20.00,
                'doctor_id' => $doctorIds[array_rand($doctorIds)]
            ],
            [
                'name' => 'Family Planning',
                'description' => 'Educational and medical services for reproductive health.',
                'duration' => 30,
                'price' => 20.00,
                'doctor_id' => $doctorIds[array_rand($doctorIds)]
            ],
            [
                'name' => 'Home Visits',
                'description' => 'Personalized medical care delivered at your home.',
                'duration' => 30,
                'price' => 30.00,
                'doctor_id' => $doctorIds[array_rand($doctorIds)]
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
