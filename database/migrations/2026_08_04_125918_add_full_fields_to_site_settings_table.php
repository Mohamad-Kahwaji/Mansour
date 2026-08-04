<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->json('site_name')->nullable();     // اسم الموقع (عربي + إنجليزي)
            $table->json('tagline')->nullable();        // الشعار النصي (عربي + إنجليزي)
            $table->json('about')->nullable();           // نبذة عن الشركة (عربي + إنجليزي)
            $table->json('address')->nullable();         // العنوان (عربي + إنجليزي)
            $table->string('logo')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('x_url')->nullable();
            $table->string('google_map_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'site_name',
                'tagline',
                'about',
                'address',
                'logo',
                'phone',
                'whatsapp',
                'email',
                'facebook_url',
                'instagram_url',
                'linkedin_url',
                'x_url',
                'google_map_url',
            ]);
        });
    }
};
