<?php

namespace Database\Seeders;

use App\Models\Site_settings;
use Illuminate\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Site_settings::query()->exists()) {
            return;
        }

        Site_settings::create([
            'site_name' => ['ar' => 'مجموعة المالكية القابضة', 'en' => 'Al Malkia Group'],
            'tagline' => ['ar' => 'معًا نصنع الإنجاز', 'en' => 'Together We Can Make It'],
            'about' => ['ar' => 'تقدم مجموعة المالكية القابضة مقاولات تسليم مفتاح، ومواد تشطيب فاخرة، وأعمال فايرستوبينغ معتمدة في جميع أنحاء المملكة، عبر شريك واحد مسؤول.', 'en' => 'Al Malkia Group delivers turnkey construction, premium finishing materials, and certified firestopping across the Kingdom — through a single, accountable partner.'],
            'address' => ['ar' => 'السليمانية، طريق الملك عبدالعزيز، تقاطع شارع الضباب، الرياض، المملكة العربية السعودية', 'en' => 'Al Sulimaniyah, King Abdul Aziz Rd, Cross Aldabab St, Riyadh, Saudi Arabia'],
            'phone' => '+966 11 292 0703',
            'whatsapp' => '+966 54 556 6999',
            'email' => 'info@mac-ksa.com',
            'facebook_url' => 'https://facebook.com/Almalkia.Group',
            'instagram_url' => 'https://instagram.com/Almalkia.Group',
            'linkedin_url' => null,
            'x_url' => 'https://twitter.com/Almalkia.Group',
            'google_map_url' => null,
            'established_location' => ['ar' => 'الرياض', 'en' => 'Riyadh'],
            'established_year' => 2005,
        ]);
    }
}
