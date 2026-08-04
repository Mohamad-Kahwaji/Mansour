<?php

namespace App\Filament\Admin\Resources\Services\Schemas;

use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ServicesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Fieldset::make('العنوان')
                    ->columns(2)
                    ->schema([
                        TextInput::make('title.ar')
                            ->label('العنوان (عربي)')
                            ->required(),
                        TextInput::make('title.en')
                            ->label('Title (English)')
                            ->required(),
                    ]),
                Fieldset::make('الوصف')
                    ->columns(2)
                    ->schema([
                        Textarea::make('description.ar')
                            ->label('الوصف (عربي)')
                            ->required()
                            ->columnSpan(1),
                        Textarea::make('description.en')
                            ->label('Description (English)')
                            ->required()
                            ->columnSpan(1),
                    ]),
                TextInput::make('icon')
                    ->label('أيقونة الخدمة'),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_featured')
                    ->required(),
            ]);
    }
}
