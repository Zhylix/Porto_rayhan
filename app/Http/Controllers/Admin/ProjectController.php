<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.project.index', compact('projects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'link' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $project = Project::create($validated);

        // CATAT PERILAKU
        ActivityLog::create([
            'action' => 'create',
            'model' => 'Project',
            'description' => 'Create project: ' . $project->title,
        ]);

        return redirect()
            ->route('admin.project.index')
            ->with('success', 'Project added.');
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'link' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($project->image && Storage::disk('public')->exists($project->image)) {
                Storage::disk('public')->delete($project->image);
            }
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($validated);

        // 🔥 CATAT PERILAKU
        ActivityLog::create([
            'action' => 'update',
            'model' => 'Project',
            'description' => 'Update project: ' . $project->title,
        ]);

        return redirect()
            ->route('admin.project.index')
            ->with('success', 'Project updated.');
    }

    public function destroy(Project $project)
    {
        $title = $project->title;

        // delete image file if exists
        if ($project->image && Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        // 🔥 CATAT PERILAKU
        ActivityLog::create([
            'action' => 'delete',
            'model' => 'Project',
            'description' => 'Delete project: ' . $title,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Project deleted successfully.');
    }
}
