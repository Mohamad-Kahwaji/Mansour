<?php

namespace App\Filament\Admin\Support;

use App\Services\ImageUploadService;
use Closure;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Spatie\MediaLibrary\HasMedia;

class CompressedMediaUpload
{
    /**
     * Build a saveUploadedFileUsing closure that compresses images via
     * ImageUploadService before adding them to the model's media collection.
     */
    public static function handler(string $directory, bool $enhance = false): Closure
    {
        return static function (SpatieMediaLibraryFileUpload $component, TemporaryUploadedFile $file, ?Model $record) use ($directory, $enhance): ?string {
            if (! ($record instanceof HasMedia) || ! $file->exists()) {
                return null;
            }

            $optimizedPath = app(ImageUploadService::class)->compressAndStore(
                file: $file,
                directory: $directory,
                enhance: $enhance,
            );

            $media = $record
                ->addMediaFromDisk($optimizedPath, 'public')
                ->toMediaCollection($component->getCollection() ?? 'default', 'public');

            Storage::disk('public')->delete($optimizedPath);

            return $media->getAttributeValue('uuid');
        };
    }
}
