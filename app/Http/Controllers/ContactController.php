<?php
namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
class ContactController extends Controller {
    public function index(): Response {
        return Inertia::render('Contact', [
            'settings' => SiteSetting::pluck('value', 'key'),
        ]);
    }
    public function store(Request $request): RedirectResponse {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',
        ]);
        Contact::create($validated);
        return redirect()->back()->with('success', 'Thank you! Your message has been sent. We will get back to you shortly.');
    }
}
