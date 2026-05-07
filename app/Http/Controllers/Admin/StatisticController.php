<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class StatisticController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/Statistics/Index', [
            'statistics' => Statistic::orderBy('order')->get(),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Statistics/Form', ['statistic' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'label' => 'required|string|max:255',
            'value' => 'required|string|max:100',
            'suffix' => 'nullable|string|max:20',
            'icon' => 'nullable|string|max:100',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);
        Statistic::create($data);
        return redirect()->route('admin.statistics.index')->with('success', 'Statistic created.');
    }

    public function edit(Statistic $statistic): Response
    {
        return Inertia::render('Admin/Statistics/Form', ['statistic' => $statistic]);
    }

    public function update(Request $request, Statistic $statistic): RedirectResponse
    {
        $data = $request->validate([
            'label' => 'required|string|max:255',
            'value' => 'required|string|max:100',
            'suffix' => 'nullable|string|max:20',
            'icon' => 'nullable|string|max:100',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);
        $statistic->update($data);
        return redirect()->route('admin.statistics.index')->with('success', 'Statistic updated.');
    }

    public function destroy(Statistic $statistic): RedirectResponse
    {
        $statistic->delete();
        return redirect()->route('admin.statistics.index')->with('success', 'Statistic deleted.');
    }
}
