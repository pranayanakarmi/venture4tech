<?php
namespace App\Http\Controllers;
use App\Models\HeroSlide;
use App\Models\HomeAboutSection;
use App\Models\HomeClientsSection;
use App\Models\HomeContactCtaSection;
use App\Models\HomeProjectsSection;
use App\Models\HomeServicesSection;
use App\Models\HomeStatsSection;
use App\Models\HomeTestimonialsSection;
use App\Models\HomeTechnologiesSection;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Statistic;
use App\Models\Technology;
use App\Models\Testimonial;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Home', [
            'heroSlides' => HeroSlide::active()->get(),
            'heroSection' => \App\Models\HomeHeroSection::first(),
            'aboutSection' => HomeAboutSection::where('is_active', true)->first(),
            'servicesSection' => HomeServicesSection::where('is_active', true)->first(),
            'services' => Service::active()->featured()->get(),
            'projectsSection' => HomeProjectsSection::where('is_active', true)->first(),
            'projects' => Project::active()->featured()->with([])->get(),
            'testimonialsSection' => HomeTestimonialsSection::where('is_active', true)->first(),
            'testimonials' => Testimonial::active()->get(),
            'statsSection' => HomeStatsSection::where('is_active', true)->first(),
            'statistics' => Statistic::active()->get(),
            'clientsSection' => HomeClientsSection::where('is_active', true)->first(),
            'partners' => Partner::active()->get(),
            'ctaSection' => HomeContactCtaSection::where('is_active', true)->first(),
            'techSection' => HomeTechnologiesSection::where('is_active', true)->first(),
            'technologies' => Technology::active()->get(),
            'settings' => SiteSetting::pluck('value', 'key'),
        ]);
    }
}
