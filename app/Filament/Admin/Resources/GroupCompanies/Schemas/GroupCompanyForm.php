<?php

namespace App\Filament\Admin\Resources\GroupCompanies\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class GroupCompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('بيانات الشركة')
                    ->icon(Heroicon::OutlinedBuildingOffice)
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('code')
                            ->label('الرمز (مثال: MAC — Contracting)')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('title.ar')
                            ->label('الاسم (عربي)')
                            ->required(),
                        TextInput::make('title.en')
                            ->label('Name (English)')
                            ->required(),
                    ]),
                Section::make('الوصف')
                    ->icon(Heroicon::OutlinedDocumentText)
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        Textarea::make('description.ar')
                            ->label('الوصف (عربي)')
                            ->required(),
                        Textarea::make('description.en')
                            ->label('Description (English)')
                            ->required(),
                    ]),
                Section::make('الترتيب والشعار')
                    ->icon(Heroicon::OutlinedPhoto)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('sort_order')
                            ->label('ترتيب العرض')
                            ->required()
                            ->numeric()
                            ->default(0),
                        SpatieMediaLibraryFileUpload::make('logo')
                            ->label('الشعار')
                            ->collection('logo')
                            ->image()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->maxSize(10240)
                            ->helperText('الحد الأقصى للصورة 10MB.')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
