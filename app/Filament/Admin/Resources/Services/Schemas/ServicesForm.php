<?php

namespace App\Filament\Admin\Resources\Services\Schemas;

use BladeUI\Icons\Factory as IconsFactory;
use Closure;
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
                            ->helperText('اسم أيقونة من مكتبة Heroicons، مثال: heroicon-o-fire')
                            ->dehydrateStateUsing(static fn(?string $state): string => trim((string) $state))
                            ->rule(static fn(): Closure => static function (string $attribute, mixed $value, Closure $fail): void {
                                $icon = trim((string) $value);

                                if ($icon === '') {
                                    return;
                                }

                                try {
                                    app(IconsFactory::class)->svg($icon);
                                } catch (\Throwable) {
                                    $fail('اسم الأيقونة غير صحيح أو غير موجود. مثال صحيح: heroicon-o-fire');
                                }
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
