<?php
namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\SiteSetting;
use Inertia\Inertia;
use Inertia\Response;
class ServicesController extends Controller {
    public function index(): Response {
        return Inertia::render('Services/Index', [
            'services' => Service::active()->get(),
            'settings' => SiteSetting::pluck('value', 'key'),
        ]);
    }
    public function show(Service $service): Response {
        return Inertia::render('Services/Show', [
            'service' => $service,
            'relatedServices' => Service::active()->where('id', '!=', $service->id)->limit(3)->get(),
            'settings' => SiteSetting::pluck('value', 'key'),
        ]);
    }
}
