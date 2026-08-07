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
                'title' => ['ar' => 'فندق موفنبيك', 'en' => 'Mövenpick Hotel'],
                'scope' => ['ar' => 'تصميم داخلي وتوريد وتركيب الرخام للوبي الفندق.', 'en' => 'Interior design, marble supply and installation for the hotel lobby.'],
                'client' => 'Mövenpick Hotels',
                'location' => 'الرياض',
                'year' => null,
                'sort_order' => 1,
                'is_featured' => true,
            ],
            [
                'title' => ['ar' => 'فندق فور سيزونز', 'en' => 'Four Seasons Hotel'],
                'scope' => ['ar' => 'تصميم وتركيب نافورة رخامية وتوريد الرخام للوبي.', 'en' => 'Marble fountain design and installation, plus lobby marble supply.'],
                'client' => 'Four Seasons Hotels',
                'location' => 'الرياض',
                'year' => null,
                'sort_order' => 2,
                'is_featured' => true,
            ],
            [
                'title' => ['ar' => 'مكاتب عبدالواحد', 'en' => 'Abdulwahed Offices'],
                'scope' => ['ar' => 'تصميم داخلي ومقاولات تسليم مفتاح وتجهيز مكاتب بمساحة 550 م².', 'en' => 'Interior design, turnkey contracting and fit-out for a 550 m² office space.'],
                'client' => 'عبدالواحد',
                'location' => 'الرياض',
                'year' => null,
                'sort_order' => 3,
                'is_featured' => true,
            ],
            [
                'title' => ['ar' => 'معارض أحمد عبدالواحد', 'en' => 'Ahmed Abdulwahed Retail Stores'],
                'scope' => ['ar' => 'تصميم داخلي ومقاولات تسليم مفتاح لعدة معارض تجزئة إلكترونيات وأجهزة منزلية.', 'en' => 'Interior design and turnkey contracting for multiple electronics and appliance retail stores.'],
                'client' => 'أحمد عبدالواحد',
                'location' => 'الرياض',
                'year' => null,
                'sort_order' => 4,
                'is_featured' => false,
            ],
            [
                'title' => ['ar' => 'مركز بيانات STC', 'en' => 'STC Data Center'],
                'scope' => ['ar' => 'تنفيذ أعمال فايرستوبينغ معتمدة (أجهزة EZ-Path) لحماية اختراقات الأنظمة الكهروميكانيكية بالأسقف والجدران.', 'en' => 'Certified firestopping installation (EZ-Path devices) protecting MEP penetrations across slabs and walls.'],
                'client' => 'STC · Benchmark Technology',
                'location' => 'KAFD، الرياض',
                'year' => 2022,
                'sort_order' => 5,
                'is_featured' => true,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
