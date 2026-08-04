<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => ['ar' => 'برج نور السكني', 'en' => 'Noor Residential Tower'],
                'scope' => ['ar' => 'تصميم وتنفيذ إنشائي كامل لبرج سكني من 20 طابق', 'en' => 'Full structural design and execution of a 20-floor residential tower'],
                'client' => 'شركة الإعمار الحديثة',
                'location' => 'بيروت',
                'year' => 2023,
                'sort_order' => 1,
                'is_featured' => true,
            ],
            [
                'title' => ['ar' => 'مجمع نور التجاري', 'en' => 'Noor Commercial Complex'],
                'scope' => ['ar' => 'إدارة مشروع وإشراف هندسي على مجمع تجاري متكامل', 'en' => 'Project management and engineering supervision of a full commercial complex'],
                'client' => 'مجموعة الأفق',
                'location' => 'طرابلس',
                'year' => 2022,
                'sort_order' => 2,
                'is_featured' => true,
            ],
            [
                'title' => ['ar' => 'مستشفى نور التخصصي', 'en' => 'Noor Specialty Hospital'],
                'scope' => ['ar' => 'تصميم وتنفيذ الأعمال الكهروميكانيكية للمستشفى', 'en' => 'MEP design and execution for the hospital'],
                'client' => 'وزارة الصحة',
                'location' => 'صيدا',
                'year' => 2024,
                'sort_order' => 3,
                'is_featured' => false,
            ],
            [
                'title' => ['ar' => 'فيلات نور السكنية', 'en' => 'Noor Residential Villas'],
                'scope' => ['ar' => 'تنفيذ مجمع فيلات سكنية فاخرة', 'en' => 'Execution of a luxury residential villa compound'],
                'client' => 'مستثمر خاص',
                'location' => 'جونية',
                'year' => 2021,
                'sort_order' => 4,
                'is_featured' => false,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
