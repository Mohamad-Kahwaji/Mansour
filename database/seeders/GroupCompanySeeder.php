<?php

namespace Database\Seeders;

use App\Models\GroupCompany;
use Illuminate\Database\Seeder;

class GroupCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'code' => 'MAC — Contracting',
                'title' => ['ar' => 'مؤسسة منصور المالك للمقاولات', 'en' => 'Mansour Al-Malik Construction'],
                'description' => ['ar' => 'تصميم وتنفيذ تسليم مفتاح يشمل الأعمال المدنية والإنشائية والميكانيكية والكهربائية والصحية والأعمال الخارجية — عقد واحد وفريق واحد مسؤول.', 'en' => 'Turnkey design-and-build covering civil, structural steel, mechanical, electrical, plumbing and external works — one contract, one accountable team.'],
                'sort_order' => 1,
            ],
            [
                'code' => 'MAT — Trading',
                'title' => ['ar' => 'مؤسسة منصور إبراهيم المالك التجارية', 'en' => 'Mansour Ibrahim Al-Malik Trading'],
                'description' => ['ar' => 'عقدان من استيراد الرخام والجرانيت والبورسلين وورق الجدران والإضاءة والأثاث من إسبانيا وإيطاليا والصين والهند للسوق المحلي والخليجي.', 'en' => 'Two decades importing marble, granite, porcelain, wallpaper, lighting and furniture from Spain, Italy, China and India for the local and Gulf markets.'],
                'sort_order' => 2,
            ],
        ];

        foreach ($companies as $company) {
            GroupCompany::create($company);
        }
    }
}
