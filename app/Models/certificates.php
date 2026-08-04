<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class certificates extends Model
{
    use HasTranslations;

    public array $translatable = ['title'];

    protected $fillable = [
        'title',
        'issuer',
        'issued_at',
        'expires_at',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'issued_at' => 'date',
            'expires_at' => 'date',
        ];
    }
}
