<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PartnerController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/Partners/Index', [
            'partners' => Partner::orderBy('order')->get(),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Partners/Form', ['partner' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
            'type' => 'required|string|in:client,partner,technology_partner',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);
        Partner::create($data);
        return redirect()->route('admin.partners.index')->with('success', 'Partner created.');
    }

    public function edit(Partner $partner): Response
    {
        return Inertia::render('Admin/Partners/Form', ['partner' => $partner]);
    }

    public function update(Request $request, Partner $partner): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
            'type' => 'required|string|in:client,partner,technology_partner',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);
        $partner->update($data);
        return redirect()->route('admin.partners.index')->with('success', 'Partner updated.');
    }

    public function destroy(Partner $partner): RedirectResponse
    {
        $partner->delete();
        return redirect()->route('admin.partners.index')->with('success', 'Partner deleted.');
    }
}
