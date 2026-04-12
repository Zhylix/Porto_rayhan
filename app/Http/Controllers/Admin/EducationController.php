<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::orderBy('created_at', 'desc')->get();
        return view('admin.education.index', compact('educations'));
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'school' => 'required|string|max:255',
        'start_year' => 'required|integer|min:1900|max:' . date('Y'),
        'end_year' => 'nullable|integer|min:1900|max:' . date('Y'),
    ]);

    Education::create($validated);

    return redirect()->route('admin.education.index')->with('success', 'Education added.');
}

public function update(Request $request, Education $education)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'school' => 'required|string|max:255',
        'start_year' => 'required|integer|min:1900|max:' . date('Y'),
        'end_year' => 'nullable|integer|min:1900|max:' . date('Y'),
    ]);

    $education->update($validated);

    return redirect()->route('admin.education.index')->with('success', 'Education updated.');
}

    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->back()->with('success', 'Education deleted successfully.');
    }
}
