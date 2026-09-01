<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Intervention\Image\Interfaces\ImageInterface;
use Throwable;

class ImageUploadService
{
    private const TARGET_MAX_BYTES = 512000; // 500KB

    private const MAX_LONGEST_SIDE = 1920;

    private const MIN_LONGEST_SIDE = 900;

    private const START_QUALITY = 82;

    private const MIN_QUALITY = 55;

    private const SHARPEN_AMOUNT = 12;

    private const CONTRAST_AMOUNT = 7;

    public function compressAndStore(UploadedFile $file, string $directory = 'uploads', bool $enhance = false): string
    {
        $this->assertValidUpload($file);

        return $this->processAndStore(
            sourcePath: (string) $file->getRealPath(),
            directory: $directory,
            enhance: $enhance,
        );
    }

    public function compressFromPublicPath(string $path, string $directory = 'uploads', bool $enhance = false): string
    {
        $disk = Storage::disk('public');

        if (! $disk->exists($path)) {
            throw ValidationException::withMessages([
                'image' => 'Uploaded image was not found on disk.',
            ]);
        }

        $tempPath = tempnam(sys_get_temp_dir(), 'upload_');

        if ($tempPath === false) {
            throw ValidationException::withMessages([
                'image' => 'Could not initialize temporary image processing path.',
            ]);
        }

        try {
            file_put_contents($tempPath, $disk->get($path));

            return $this->processAndStore(
                sourcePath: $tempPath,
                directory: $directory,
                enhance: $enhance,
            );
        } catch (ValidationException $exception) {
            throw $exception;
        } catch (Throwable $exception) {
            report($exception);

            throw ValidationException::withMessages([
                'image' => 'Failed to compress and store uploaded image.',
            ]);
        } finally {
            if (is_file($tempPath)) {
                @unlink($tempPath);
            }
        }
    }

    private function assertValidUpload(UploadedFile $file): void
    {
        $allowedMimes = ['image/jpeg', 'image/png', 'image/webp'];

        if (! in_array($file->getMimeType(), $allowedMimes, true)) {
            throw ValidationException::withMessages([
                'image' => 'Unsupported image mime type. Allowed: jpeg, png, webp.',
            ]);
        }

        if ($file->getSize() > 10 * 1024 * 1024) {
            throw ValidationException::withMessages([
                'image' => 'Original image size must be 10MB or smaller.',
            ]);
        }
    }

    private function processAndStore(string $sourcePath, string $directory, bool $enhance): string
    {
        try {
            $manager = new ImageManager(new Driver);
            $image = $manager->read($sourcePath);

            $image = $this->resizeToLongestSide($image, self::MAX_LONGEST_SIDE);

            if ($enhance) {
                $image = $this->enhanceImage($image);
            }

            $quality = self::START_QUALITY;
            $encoded = $image->toWebp($quality);

            while ($encoded->size() > self::TARGET_MAX_BYTES && $quality > self::MIN_QUALITY) {
                $quality -= 7;
                $encoded = $image->toWebp($quality);
            }

            while ($encoded->size() > self::TARGET_MAX_BYTES && max($image->width(), $image->height()) > self::MIN_LONGEST_SIDE) {
                $image = $this->downscaleByPercent($image, 0.9);
                $encoded = $image->toWebp($quality);
            }

            $filename = Str::ulid()->toBase32() . '.webp';
            $path = trim($directory, '/') . '/' . $filename;

            $stored = Storage::disk('public')->put($path, $encoded->toString());

            if (! $stored) {
                throw ValidationException::withMessages([
                    'image' => 'Failed to store optimized image file.',
                ]);
            }

            return $path;
        } catch (ValidationException $exception) {
            throw $exception;
        } catch (Throwable $exception) {
            report($exception);

            throw ValidationException::withMessages([
                'image' => 'Failed to compress and store uploaded image.',
            ]);
        }
    }

    private function resizeToLongestSide(ImageInterface $image, int $maxLongestSide): ImageInterface
    {
        $width = $image->width();
        $height = $image->height();

        if (max($width, $height) <= $maxLongestSide) {
            return $image;
        }

        if ($width >= $height) {
            return $image->scaleDown(width: $maxLongestSide);
        }

        return $image->scaleDown(height: $maxLongestSide);
    }

    private function downscaleByPercent(ImageInterface $image, float $factor): ImageInterface
    {
        $width = max((int) round($image->width() * $factor), 1);
        $height = max((int) round($image->height() * $factor), 1);

        return $image->scaleDown(width: $width, height: $height);
    }

    public function enhanceImage(ImageInterface $image): ImageInterface
    {
        return $image
            ->sharpen(self::SHARPEN_AMOUNT)
            ->contrast(self::CONTRAST_AMOUNT);
    }
}
