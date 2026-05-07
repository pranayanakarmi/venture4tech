<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class TechnologyController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/Technologies/Index', [
            'technologies' => Technology::orderBy('order')->get(),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Technologies/Form', ['technology' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'category' => 'nullable|string|max:100',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);
        Technology::create($data);
        return redirect()->route('admin.technologies.index')->with('success', 'Technology created.');
    }

    public function edit(Technology $technology): Response
    {
        return Inertia::render('Admin/Technologies/Form', ['technology' => $technology]);
    }

    public function update(Request $request, Technology $technology): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'category' => 'nullable|string|max:100',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);
        $technology->update($data);
        return redirect()->route('admin.technologies.index')->with('success', 'Technology updated.');
    }

    public function destroy(Technology $technology): RedirectResponse
    {
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('success', 'Technology deleted.');
    }
}
