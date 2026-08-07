<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Project extends Model implements HasMedia
{
    use HasTranslations;
    use InteractsWithMedia;

    public array $translatable = ['title', 'scope'];

    protected $fillable = [
        'title',
        'scope',
        'client',
        'location',
        'year',
        'sort_order',
        'is_featured',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('gallery')->useDisk('public');
    }
}
