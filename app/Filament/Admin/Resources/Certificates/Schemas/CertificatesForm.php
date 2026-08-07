<?php

namespace App\Filament\Admin\Resources\Certificates\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class CertificatesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('عنوان الشهادة')
                    ->icon(Heroicon::OutlinedTag)
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('title.ar')
                            ->label('العنوان (عربي)')
                            ->required(),
                        TextInput::make('title.en')
                            ->label('Title (English)')
                            ->required(),
                    ]),
                Section::make('تفاصيل الشهادة')
                    ->icon(Heroicon::OutlinedClipboardDocumentCheck)
                    ->columnSpanFull()
                    ->columns(3)
                    ->schema([
                        TextInput::make('issuer')
                            ->label('الجهة المانحة'),
                        DatePicker::make('issued_at')
                            ->label('تاريخ الإصدار'),
                        DatePicker::make('expires_at')
                            ->label('تاريخ الانتهاء'),
                        TextInput::make('sort_order')
                            ->label('ترتيب العرض')
                            ->required()
                            ->numeric()
                            ->default(0),
                    ]),
                Section::make('صورة الشهادة')
                    ->icon(Heroicon::OutlinedPhoto)
                    ->columnSpanFull()
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('cover')
                            ->label('صورة الشهادة')
                            ->collection('cover')
                            ->image()
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
