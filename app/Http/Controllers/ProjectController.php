<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Site_settings;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        return view('projects.index', [
            'siteSettings' => Site_settings::first(),
            'projects' => Project::orderBy('sort_order')->get(),
        ]);
    }
}
