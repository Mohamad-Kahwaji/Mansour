<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Firestopping extends Model implements HasMedia
{
    use HasTranslations;
    use InteractsWithMedia;

    public array $translatable = ['heading', 'description'];

    protected $fillable = [
        'heading',
        'description',
        'badges',
    ];

    protected function casts(): array
    {
        return [
            'badges' => 'array',
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('visual')->useDisk('public');
    }
}
