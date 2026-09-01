<?php

namespace Database\Seeders;

use App\Models\Certificates;
use Illuminate\Database\Seeder;

class CertificatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $certificates = [
            [
                'title' => ['ar' => 'اعتماد STI لتطبيق الفايرستوبينغ', 'en' => 'STI Accredited Firestop Applicator'],
                'issuer' => 'Specified Technologies Inc. (STI)',
                'issued_at' => '2022-03-01',
                'expires_at' => '2023-03-30',
                'sort_order' => 1,
            ],
        ];

        foreach ($certificates as $certificate) {
            Certificates::create($certificate);
        }
    }
}
