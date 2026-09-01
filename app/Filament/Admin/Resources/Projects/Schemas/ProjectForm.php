<?php

namespace App\Filament\Admin\Resources\Projects\Schemas;

use App\Services\ImageUploadService;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Spatie\MediaLibrary\HasMedia;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('عنوان المشروع')
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
                Section::make('نطاق العمل')
                    ->icon(Heroicon::OutlinedClipboardDocumentList)
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        Textarea::make('scope.ar')
                            ->label('نطاق العمل (عربي)'),
                        Textarea::make('scope.en')
                            ->label('Scope (English)'),
                    ]),
                Section::make('تفاصيل المشروع')
                    ->icon(Heroicon::OutlinedBuildingOffice)
                    ->columnSpanFull()
                    ->columns(3)
                    ->schema([
                        TextInput::make('client')
                            ->label('العميل'),
                        TextInput::make('location')
                            ->label('الموقع'),
                        TextInput::make('year')
                            ->label('السنة')
                            ->numeric(),
                        TextInput::make('sort_order')
                            ->label('ترتيب العرض')
                            ->required()
                            ->numeric()
                            ->default(0),
                        Toggle::make('is_featured')
                            ->label('مشروع مميز')
                            ->required(),
                    ]),
                Section::make('معرض الصور')
                    ->icon(Heroicon::OutlinedPhoto)
                    ->columnSpanFull()
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('gallery')
                            ->label('معرض صور المشروع')
                            ->collection('gallery')
                            ->image()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->maxSize(10240)
                            ->maxParallelUploads(1)
                            ->helperText('الحد الأقصى للصورة 10MB. يتم ضغط الصورة تلقائيًا وتحويلها إلى WebP.')
                            ->multiple()
                            ->reorderable()
                            ->saveUploadedFileUsing(static function (SpatieMediaLibraryFileUpload $component, TemporaryUploadedFile $file, ?Model $record): ?string {
                                if (! ($record instanceof HasMedia)) {
                                    return null;
                                }

                                if (! $file->exists()) {
                                    return null;
                                }

                                $optimizedPath = app(ImageUploadService::class)->compressAndStore(
                                    file: $file,
                                    directory: 'projects',
                                    enhance: true,
                                );

                                $media = $record
                                    ->addMediaFromDisk($optimizedPath, 'public')
                                    ->toMediaCollection($component->getCollection() ?? 'default', 'public');

                                Storage::disk('public')->delete($optimizedPath);

                                return $media->getAttributeValue('uuid');
                            })
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
