<?php

namespace App\Http\Controllers;

use App\Models\services;
use App\Models\Site_settings;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        return view('services.index', [
            'siteSettings' => Site_settings::first(),
            'services' => services::orderBy('sort_order')->get(),
        ]);
    }
}
