<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use Inertia\Inertia;
use Inertia\Response;
class DashboardController extends Controller {
    public function index(): Response {
        return Inertia::render('Admin/Dashboard', [
            'stats' => [
                'services' => Service::count(),
                'projects' => Project::count(),
                'testimonials' => Testimonial::count(),
                'contacts' => Contact::count(),
                'unread_contacts' => Contact::where('is_read', false)->count(),
            ],
            'recentContacts' => Contact::latest()->limit(5)->get(),
        ]);
    }
}
