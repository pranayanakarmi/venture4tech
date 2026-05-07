<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SiteSettingController extends Controller
{
    private array $keys = [
        'company_name', 'company_tagline', 'company_email', 'company_phone',
        'company_address', 'company_about',
        'social_linkedin', 'social_twitter', 'social_facebook', 'social_instagram', 'social_github',
        'footer_copyright', 'footer_tagline',
        'meta_title', 'meta_description',
    ];

    public function index(): Response
    {
        $settings = [];
        foreach ($this->keys as $key) {
            $settings[$key] = SiteSetting::get($key, '');
        }
        return Inertia::render('Admin/SiteSettings/Index', ['settings' => $settings]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'company_name' => 'nullable|string|max:255',
            'company_tagline' => 'nullable|string|max:255',
            'company_email' => 'nullable|email|max:255',
            'company_phone' => 'nullable|string|max:50',
            'company_address' => 'nullable|string|max:500',
            'company_about' => 'nullable|string',
            'social_linkedin' => 'nullable|string|max:255',
            'social_twitter' => 'nullable|string|max:255',
            'social_facebook' => 'nullable|string|max:255',
            'social_instagram' => 'nullable|string|max:255',
            'social_github' => 'nullable|string|max:255',
            'footer_copyright' => 'nullable|string|max:255',
            'footer_tagline' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);
        foreach ($data as $key => $value) {
            SiteSetting::set($key, $value ?? '');
        }
        return redirect()->route('admin.site-settings.index')->with('success', 'Settings saved successfully.');
    }
}
