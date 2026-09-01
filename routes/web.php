<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/lang/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');

// Example image endpoints using ImageUploadService compression.
Route::post('/image-upload', [ImageUploadController::class, 'store'])->name('image-upload.store');
Route::put('/image-upload', [ImageUploadController::class, 'update'])->name('image-upload.update');
