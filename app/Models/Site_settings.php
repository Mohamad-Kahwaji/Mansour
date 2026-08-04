<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Site_settings extends Model
{
    use HasTranslations;

    public array $translatable = ['site_name', 'tagline', 'about', 'address'];

    protected $fillable = [
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
    ];
}
