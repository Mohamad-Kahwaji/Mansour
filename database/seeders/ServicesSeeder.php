<?php

namespace Database\Seeders;

use App\Models\services;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => ['ar' => 'التصميم الإنشائي', 'en' => 'Structural Design'],
                'description' => ['ar' => 'تصميم إنشائي متكامل للمباني السكنية والتجارية وفق أحدث المعايير', 'en' => 'Complete structural design for residential and commercial buildings following the latest standards'],
                'icon' => 'heroicon-o-building-office-2',
                'sort_order' => 1,
                'is_featured' => true,
            ],
            [
                'title' => ['ar' => 'إدارة المشاريع', 'en' => 'Project Management'],
                'description' => ['ar' => 'إشراف وإدارة كاملة للمشاريع الهندسية من التخطيط حتى التسليم', 'en' => 'Full supervision and management of engineering projects from planning to handover'],
                'icon' => 'heroicon-o-clipboard-document-check',
                'sort_order' => 2,
                'is_featured' => true,
            ],
            [
                'title' => ['ar' => 'الأعمال الكهروميكانيكية', 'en' => 'MEP Works'],
                'description' => ['ar' => 'تصميم وتنفيذ الأنظمة الكهربائية والميكانيكية والصحية', 'en' => 'Design and execution of electrical, mechanical, and plumbing systems'],
                'icon' => 'heroicon-o-bolt',
                'sort_order' => 3,
                'is_featured' => false,
            ],
            [
                'title' => ['ar' => 'الاستشارات الهندسية', 'en' => 'Engineering Consultancy'],
                'description' => ['ar' => 'تقديم الاستشارات الفنية والهندسية لأصحاب المشاريع', 'en' => 'Providing technical and engineering consultancy for project owners'],
                'icon' => 'heroicon-o-light-bulb',
                'sort_order' => 4,
                'is_featured' => false,
            ],
        ];

        foreach ($services as $service) {
            services::create($service);
        }
    }
}
