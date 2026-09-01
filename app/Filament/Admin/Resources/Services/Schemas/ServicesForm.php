<?php

namespace App\Filament\Admin\Resources\Services\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ServicesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('عنوان الخدمة')
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
                Section::make('تفاصيل الخدمة')
                    ->icon(Heroicon::OutlinedSparkles)
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('icon')
                            ->label('أيقونة الخدمة')
                            ->helperText('مثال: heroicon-o-fire')
                            ->rule(function () {
                                return function (string $attribute, $value, \Closure $fail) {
                                    if (blank($value)) {
                                        return;
                                    }

                                    try {
                                        app(\BladeUI\Icons\Factory::class)->make($value);
                                    } catch (\Throwable $e) {
                                        $fail('اسم الأيقونة غير موجود. تأكد من اسم Heroicon.');
                                    }
                                };
                            })
                            ->columnSpanFull(),
                        TextInput::make('sort_order')
                            ->label('ترتيب العرض')
                            ->required()
                            ->numeric()
                            ->default(0),
                        Toggle::make('is_featured')
                            ->label('خدمة مميزة')
                            ->required(),
                    ]),
                Section::make('صورة الخدمة')
                    ->icon(Heroicon::OutlinedPhoto)
                    ->columnSpanFull()
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('cover')
                            ->label('صورة الخدمة')
                            ->collection('cover')
                            ->image()
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
