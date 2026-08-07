<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('firestoppings', function (Blueprint $table) {
            $table->json('badges')->nullable();
        });

        foreach (DB::table('firestoppings')->get() as $row) {
            if (blank($row->badge_title)) {
                continue;
            }

            $subtitle = json_decode((string) $row->badge_subtitle, true) ?? [];

            DB::table('firestoppings')->where('id', $row->id)->update([
                'badges' => json_encode([
                    [
                        'title' => $row->badge_title,
                        'subtitle_ar' => $subtitle['ar'] ?? '',
                        'subtitle_en' => $subtitle['en'] ?? '',
                    ],
                ]),
            ]);
        }

        Schema::table('firestoppings', function (Blueprint $table) {
            $table->dropColumn(['badge_title', 'badge_subtitle']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('firestoppings', function (Blueprint $table) {
            $table->string('badge_title')->nullable();
            $table->json('badge_subtitle')->nullable();
        });

        foreach (DB::table('firestoppings')->get() as $row) {
            $badges = json_decode((string) $row->badges, true) ?? [];
            $first = $badges[0] ?? null;

            if (! $first) {
                continue;
            }

            DB::table('firestoppings')->where('id', $row->id)->update([
                'badge_title' => $first['title'] ?? null,
                'badge_subtitle' => json_encode([
                    'ar' => $first['subtitle_ar'] ?? '',
                    'en' => $first['subtitle_en'] ?? '',
                ]),
            ]);
        }

        Schema::table('firestoppings', function (Blueprint $table) {
            $table->dropColumn('badges');
        });
    }
};
