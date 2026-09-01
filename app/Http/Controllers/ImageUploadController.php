<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageUploadRequest;
use App\Http\Requests\UpdateImageUploadRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Throwable;

class ImageUploadController extends Controller
{
    public function store(StoreImageUploadRequest $request): JsonResponse
    {
        try {
            $path = $request->file('image')->store('uploads', 'public');

            return response()->json([
                'message' => 'Image uploaded successfully.',
                'path' => $path,
                'url' => asset('storage/' . $path),
            ], 201);
        } catch (ValidationException $exception) {
            throw $exception;
        } catch (Throwable $exception) {
            report($exception);

            return response()->json([
                'message' => 'Failed to upload image.',
            ], 500);
        }
    }

    public function update(UpdateImageUploadRequest $request): JsonResponse
    {
        try {
            $oldPath = $request->validated('old_path');
            $newPath = $oldPath;

            if ($request->hasFile('image')) {
                $newPath = $request->file('image')->store('uploads', 'public');

                if (is_string($oldPath) && $oldPath !== '' && $oldPath !== $newPath) {
                    Storage::disk('public')->delete($oldPath);
                }
            }

            return response()->json([
                'message' => 'Image updated successfully.',
                'path' => $newPath,
                'url' => is_string($newPath) && $newPath !== '' ? asset('storage/' . $newPath) : null,
            ]);
        } catch (ValidationException $exception) {
            throw $exception;
        } catch (Throwable $exception) {
            report($exception);

            return response()->json([
                'message' => 'Failed to update image.',
            ], 500);
        }
    }
}
