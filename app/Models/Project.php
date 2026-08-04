<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    use HasTranslations;

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
}
