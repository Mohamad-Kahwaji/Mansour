<?php

namespace Database\Seeders;

use App\Models\Firestopping;
use Illuminate\Database\Seeder;

class FirestoppingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Firestopping::query()->exists()) {
            return;
        }

        Firestopping::create([
            'heading' => ['ar' => 'فايرستوبينغ معتمد — تخصص هندسي نادر', 'en' => 'Certified firestopping — a rare, engineered discipline.'],
            'description' => ['ar' => 'نوفر ونركّب أنظمة الحماية السلبية من الحريق لإغلاق اختراقات الأنظمة الكهروميكانيكية والفواصل الإنشائية والواجهات الزجاجية — باستخدام منتجات STI حصريًا، مدعومين بخبرة أمريكية تتجاوز 30 عامًا في هذا المجال. نُفّذت أعمالنا في مركز بيانات STC بـ KAFD.', 'en' => 'We supply and apply passive fire protection to seal MEP penetrations, construction joints and curtain walls — using STI products exclusively, backed by 30+ years of US firestop engineering. Delivered on the STC Data Center at KAFD.'],
            'badges' => [
                [
                    'title' => 'STI Accredited Applicator',
                    'subtitle_ar' => 'معتمدون للتركيب في السعودية · شامل الضمان',
                    'subtitle_en' => 'Authorized to install in KSA · warranty included',
                ],
            ],
        ]);
    }
}
