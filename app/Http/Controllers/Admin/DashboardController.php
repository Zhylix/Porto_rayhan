<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Education;
use App\Models\ActivityLog;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // ======================
        // STAT CARD DATA
        // ======================
        $totalProjects   = Project::count();
        $totalExperience = Experience::count();
        $totalEducation  = Education::count();
        $totalSatisfaction = $totalProjects + $totalExperience + $totalEducation;

        // ======================
        // ACTIVITY CHART (30 HARI TERAKHIR)
        // ======================
        $activities = ActivityLog::where('created_at', '>=', now()->subDays(30))
            ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $activityLabels = $activities->pluck('date')->map(function ($date) {
            return Carbon::parse($date)->format('d M');
        });

        $activityValues = $activities->pluck('total');

        // ======================
        // RECENT ACTIVITY LOG
        // ======================
        $recentActivities = ActivityLog::latest()->limit(6)->get();

        // ======================
        // RECENT PROJECT
        // ======================
        $recentProjects = Project::latest()->limit(5)->get();

        return view('admin.dashboard', compact(
            'totalSatisfaction',
            'totalProjects',
            'totalExperience',
            'totalEducation',
            'activityLabels',
            'activityValues',
            'recentActivities',
            'recentProjects'
        ));
    }
}
