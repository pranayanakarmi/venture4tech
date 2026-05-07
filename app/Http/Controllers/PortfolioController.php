<?php
namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\SiteSetting;
use Inertia\Inertia;
use Inertia\Response;
class PortfolioController extends Controller {
    public function index(): Response {
        return Inertia::render('Portfolio/Index', [
            'projects' => Project::active()->get(),
            'settings' => SiteSetting::pluck('value', 'key'),
        ]);
    }
    public function show(Project $project): Response {
        return Inertia::render('Portfolio/Show', [
            'project' => $project,
            'settings' => SiteSetting::pluck('value', 'key'),
        ]);
    }
}
