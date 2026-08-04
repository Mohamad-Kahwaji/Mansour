<?php

namespace App\Filament\Admin\Resources\Projects\Schemas;

use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProjectForm
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
                Fieldset::make('نطاق العمل')
                    ->columns(2)
                    ->schema([
                        Textarea::make('scope.ar')
                            ->label('نطاق العمل (عربي)')
                            ->required(),
                        Textarea::make('scope.en')
                            ->label('Scope (English)')
                            ->required(),
                    ]),
                TextInput::make('client'),
                TextInput::make('location'),
                TextInput::make('year')
                    ->numeric(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_featured')
                    ->required(),
            ]);
    }
}
