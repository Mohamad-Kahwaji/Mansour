<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/lang/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');

// TEMP: diagnostic route, remove after debugging storage symlink.
Route::get('/__diag-storage-x9k2', function () {
    abort_unless(request()->query('key') === 'mansour-debug-2026', 404);

    $publicStorage = public_path('storage');
    $publicDir = storage_path('app/public');

    return response()->json([
        'public_storage_is_link' => is_link($publicStorage),
        'public_storage_readlink' => is_link($publicStorage) ? readlink($publicStorage) : null,
        'public_storage_exists' => file_exists($publicStorage),
        'public_dir_exists' => is_dir($publicDir),
        'public_dir_contents' => is_dir($publicDir) ? glob($publicDir . '/*') : null,
        'site_dir_contents' => is_dir($publicDir . '/site') ? glob($publicDir . '/site/*') : null,
        'target_file_exists' => file_exists($publicDir . '/site/01M1EDMHZ346DQDZQX7GMB6CXT.jpg'),
    ]);
});
