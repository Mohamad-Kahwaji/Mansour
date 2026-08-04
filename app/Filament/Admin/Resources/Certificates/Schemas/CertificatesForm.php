<?php

namespace App\Filament\Admin\Resources\Certificates\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CertificatesForm
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
                TextInput::make('issuer')
                    ->label('الجهة المانحة'),
                DatePicker::make('issued_at')
                    ->label('تاريخ الإصدار'),
                DatePicker::make('expires_at')
                    ->label('تاريخ الانتهاء'),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
