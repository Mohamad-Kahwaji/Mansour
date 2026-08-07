<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class GroupCompany extends Model implements HasMedia
{
    use HasTranslations;
    use InteractsWithMedia;

    public array $translatable = ['title', 'description'];

    protected $fillable = [
        'code',
        'title',
        'description',
        'sort_order',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')->singleFile()->useDisk('public');
    }
}
