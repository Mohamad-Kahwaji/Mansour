<?php

namespace Database\Seeders;

use App\Models\Services;
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
                'title' => ['ar' => 'الحجر الطبيعي والصناعي', 'en' => 'Natural & Artificial Stone'],
                'description' => ['ar' => 'أعمدة، نوافير، تكسيات، ومنتجات ووتر جت.', 'en' => 'Columns, fountains, cladding and water-jet products.'],
                'icon' => 'heroicon-o-building-office-2',
                'sort_order' => 1,
                'is_featured' => true,
            ],
            [
                'title' => ['ar' => 'رخام · سيراميك · موزاييك', 'en' => 'Marble · Ceramic · Mosaic'],
                'description' => ['ar' => 'توريد وتركيب البلاط، الدرج، الديكورات، والأرضيات.', 'en' => 'Supply and install: plates, stairs, decorations, floors.'],
                'icon' => 'heroicon-o-squares-2x2',
                'sort_order' => 2,
                'is_featured' => true,
            ],
            [
                'title' => ['ar' => 'جبس · بارجيت · GRC', 'en' => 'Gypsum · Parget · GRC'],
                'description' => ['ar' => 'ورود أسقف، كرانيش، أسقف مستعارة، وأعمدة.', 'en' => 'Ceiling roses, cornices, false ceilings, pillars.'],
                'icon' => 'heroicon-o-sparkles',
                'sort_order' => 3,
                'is_featured' => false,
            ],
            [
                'title' => ['ar' => 'ورق جدران ودهانات', 'en' => 'Wallpaper & Paints'],
                'description' => ['ar' => 'أغطية جدران وملصقات من مصنّعين عالميين.', 'en' => 'Wall coverings and decals from global manufacturers.'],
                'icon' => 'heroicon-o-swatch',
                'sort_order' => 4,
                'is_featured' => false,
            ],
            [
                'title' => ['ar' => 'ألمنيوم وأعمال معدنية', 'en' => 'Aluminium & Metal Works'],
                'description' => ['ar' => 'تصنيع معدني وخشبي للأعمال الداخلية.', 'en' => 'Metal and wooden fabrication for interiors.'],
                'icon' => 'heroicon-o-cube',
                'sort_order' => 5,
                'is_featured' => false,
            ],
            [
                'title' => ['ar' => 'مطابخ وإكسسوارات', 'en' => 'Kitchens & Accessories'],
                'description' => ['ar' => 'خزائن وتجهيزات مخصصة للمنازل والفنادق.', 'en' => 'Custom cabinetry and fittings for homes and hotels.'],
                'icon' => 'heroicon-o-home-modern',
                'sort_order' => 6,
                'is_featured' => false,
            ],
            [
                'title' => ['ar' => 'أعمال ميكانيكية وكهربائية وتكييف', 'en' => 'MEP — Mechanical · Electrical · HVAC'],
                'description' => ['ar' => 'نطاق كامل من الأعمال الميكانيكية والكهربائية والتكييف.', 'en' => 'Full mechanical, electrical and air-conditioning scope.'],
                'icon' => 'heroicon-o-bolt',
                'sort_order' => 7,
                'is_featured' => true,
            ],
            [
                'title' => ['ar' => 'فايرستوبينغ معتمد', 'en' => 'Certified Firestopping'],
                'description' => ['ar' => 'حماية حريق سلبية معتمدة من STI لاختراقات الأنظمة.', 'en' => 'STI-certified passive fire protection for penetrations.'],
                'icon' => 'heroicon-o-fire',
                'sort_order' => 8,
                'is_featured' => true,
            ],
            [
                'title' => ['ar' => 'مقاولات تسليم مفتاح', 'en' => 'Turnkey Contracting'],
                'description' => ['ar' => 'مسؤولية كاملة من التصميم وحتى التسليم.', 'en' => 'Full responsibility from design through handover.'],
                'icon' => 'heroicon-o-clipboard-document-check',
                'sort_order' => 9,
                'is_featured' => true,
            ],
        ];

        foreach ($services as $service) {
            Services::create($service);
        }
    }
}
