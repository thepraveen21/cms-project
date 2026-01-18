<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Industry;
use App\Models\Career;
use App\Models\Partner;
use App\Models\Officer;
use App\Models\News;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'sliders' => Slider::count(),
            'services' => Service::count(),
            'industries' => Industry::count(),
            'careers' => Career::count(),
            'partners' => Partner::count(),
            'officers' => Officer::count(),
            'news' => News::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}