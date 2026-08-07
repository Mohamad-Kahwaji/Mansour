<?php

namespace App\Http\Controllers;

use App\Models\certificates;
use App\Models\Firestopping;
use App\Models\GroupCompany;
use App\Models\Project;
use App\Models\services;
use App\Models\Site_settings;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home', [
            'siteSettings' => Site_settings::first(),
            'companies' => GroupCompany::orderBy('sort_order')->get(),
            'services' => $this->featuredOrLatest(services::query(), 6),
            'projects' => $this->featuredOrLatest(Project::query(), 6),
            'certificates' => certificates::orderBy('sort_order')->get(),
            'firestopping' => Firestopping::first(),
        ]);
    }

    private function featuredOrLatest(Builder $query, int $limit): Collection
    {
        $featured = (clone $query)->where('is_featured', true)->orderBy('sort_order')->limit($limit)->get();

        return $featured->isNotEmpty()
            ? $featured
            : $query->orderBy('sort_order')->limit($limit)->get();
    }
}
