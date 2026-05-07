<?php
namespace App\Http\Controllers;
use App\Models\SiteSetting;
use App\Models\TeamMember;
use App\Models\Statistic;
use Inertia\Inertia;
use Inertia\Response;
class AboutController extends Controller {
    public function index(): Response {
        return Inertia::render('About', [
            'team' => TeamMember::active()->get(),
            'statistics' => Statistic::active()->get(),
            'settings' => SiteSetting::pluck('value', 'key'),
        ]);
    }
}
