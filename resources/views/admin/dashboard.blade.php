@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<h1 class="text-3xl font-bold mb-6">Dashboard</h1>

<!-- STATS -->
<div class="grid grid-cols-4 gap-4 mb-6">
    <div class="bg-white p-4 rounded-xl shadow-sm transition-transform hover:scale-105 duration-300">
        <div class="icon-container flex items-center justify-center mb-2 text-gray-500">
            <i data-lucide="folder" class="w-[45px] h-[45px]"></i>
        </div>
        <p class="text-sm text-center text-gray-500">Total Projects</p>
        <h2 class="text-2xl text-center font-bold">{{ $totalProjects }}+ Pj</h2>
    </div>
    
    <div class="bg-white p-4 rounded-xl shadow-sm">
        <div class="icon-container flex items-center justify-center mb-2 text-gray-500">
            <i data-lucide="briefcase" class="w-[45px] h-[45px]"></i>
        </div>
        <p class="text-sm text-center text-gray-500">Experience</p>
        <h2 class="text-2xl text-center font-bold">{{ $totalExperience }}+ Exp</h2>
    </div>
    
    <div class="bg-white p-4 rounded-xl shadow-sm">
        <div class="icon-container flex items-center justify-center mb-2 text-gray-500">
            <i data-lucide="graduation-cap" class="w-[45px] h-[45px]"></i>
        </div>
        <p class="text-sm text-center text-gray-500">Education</p>
        <h2 class="text-2xl text-center font-bold">{{ $totalEducation }}+ Edc</h2>
    </div>
    
    <div class="bg-white p-4 rounded-xl shadow-sm">
        <div class="icon-container flex items-center justify-center mb-2 text-gray-500">
            <i data-lucide="smile" class="w-[45px] h-[45px]"></i>
        </div>
        <p class="text-sm text-center text-gray-500">Admin Performance</p>
        <h2 class="text-2xl text-center font-bold">{{$totalSatisfaction}}</h2>
    </div>
</div>

<!-- CHART -->
<div class="grid grid-cols-2 gap-6 mb-6">
    <div class="bg-white p-4 rounded-xl shadow-sm h-[300px]">
        <h3 class="font-semibold mb-3">Admin Activity</h3>
        <canvas id="activityChart"></canvas>
    </div>

    <div class="bg-white p-4 rounded-xl shadow-sm h-[300px]">
        <h3 class="font-semibold mb-3">Tech Stack Usage</h3>
        <div class="container-tech h-[230px]">
            <canvas id="techChart" class="flex items-center"></canvas>
        </div>
    </div>
</div>

<!-- RECENT PROJECT -->
<div class="bg-white p-4 rounded-xl shadow-sm">
    <h3 class="font-semibold mb-4">Recent Projects</h3>

    <table class="w-full text-sm">
        <thead class="text-gray-500 border-b">
            <tr>
                <th class="py-2 text-left">Project</th>
                <th class="py-2 text-left">Status</th>
                <th class="py-2 text-left">Date</th>
            </tr>
        </thead>
        <tbody>
        @foreach($recentProjects as $project)
            <tr class="border-b">
                <td class="py-2">{{ $project->title }}</td>
                <td>
                    <span class="px-2 py-1 rounded text-xs bg-green-100 text-green-600">
                        Completed
                    </span>
                </td>
                <td>{{ $project->created_at->format('d M Y') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {

    // ===== ADMIN ACTIVITY CHART =====
    const activityCtx = document.getElementById('activityChart');
    if (activityCtx) {
        new Chart(activityCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode($activityLabels) !!},
                datasets: [{
                    label: 'Admin Activity',
                    data: {!! json_encode($activityValues) !!},
                    borderWidth: 2,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 1 }
                    }
                }
            }
        });
    }

    // ===== TECH STACK CHART =====
    const techCtx = document.getElementById('techChart');
    if (techCtx) {
        new Chart(techCtx, {
            type: 'doughnut',
            data: {
                labels: ['Laravel', 'MySql', 'Tailwind CSS', 'Other'],
                datasets: [{
                    data: [60, 20, 15, 5]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    }

});
</script>
@endpush
