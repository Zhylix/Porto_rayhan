<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('created_at', 'desc')->get();
        return view('admin.experience.index', compact('experiences'));
    }

    public function store(Request $request)
    {
    $validated = $request->validate([
        'position' => 'required|string|max:255',
        'company' => 'required|string|max:255',
        'start_year' => 'required|integer',
        'end_year' => 'nullable|integer',
    ]);

    Experience::create($validated);

    return redirect()
        ->route('admin.experience.index')
        ->with('success', 'Experience added.');
    }

    public function update(Request $request, Experience $experience)
    {
    $validated = $request->validate([
        'position' => 'required|string|max:255',
        'company' => 'required|string|max:255',
        'start_year' => 'required|integer',
        'end_year' => 'nullable|integer',
    ]);

    $experience->update($validated);

    return redirect()
        ->route('admin.experience.index')
        ->with('success', 'Experience updated.');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->back()->with('success', 'Experience deleted successfully.');
    }
}
