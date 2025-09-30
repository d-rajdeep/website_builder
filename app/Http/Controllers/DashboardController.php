<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use App\Models\Slider;
use App\Models\Feature;
use App\Models\About;
use App\Models\Counter;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Testimonial;
use App\Models\Contact;
use App\Models\CustomCss;
use App\Models\Setting;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'logosCount'        => Logo::count(),
            'slidersCount'      => Slider::count(),
            'featuresCount'     => Feature::count(),
            'aboutCount'        => About::count(),
            // 'countersCount'     => Counter::count(),
            'servicesCount'     => Service::count(),
            // 'portfolioCount'    => Portfolio::count(),
            // 'testimonialsCount' => Testimonial::count(),
            // 'contactsCount'     => Contact::count(),
            // 'customCssCount'    => CustomCss::count(),
            // 'settingsCount'     => Setting::count(),
        ]);
    }
}
