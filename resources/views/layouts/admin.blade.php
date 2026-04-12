<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Alpine (WAJIB buat dropdown) --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Icons --}}
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    {{-- Chart --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>

    @stack('styles')
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white border-r border-gray-200 fixed inset-y-0 left-0">
        <div class="p-6 text-xl font-extrabold">
            {{ Auth::user()->name}}
            <p class="text-xs text-gray-500 font-normal">Admin Dashboard</p>
        </div>

        <nav class="px-4 space-y-1 text-sm">
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100
               {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 font-medium' : '' }}">
                <i data-lucide="layout-dashboard"></i> Overview
            </a>

            <a href="{{ route('admin.project.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100
               {{ request()->routeIs('admin.project.*') ? 'bg-gray-100 font-medium' : '' }}">
                <i data-lucide="folder"></i> Projects
            </a>

            <a href="{{ route('admin.experience.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100
               {{ request()->routeIs('admin.experience.*') ? 'bg-gray-100 font-medium' : '' }}">
                <i data-lucide="briefcase"></i> Experience
            </a>

            <a href="{{ route('admin.education.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100
               {{ request()->routeIs('admin.education.*') ? 'bg-gray-100 font-medium' : '' }}">
                <i data-lucide="graduation-cap"></i> Education
            </a>
        </nav>
    </aside>

    <!-- MAIN -->
    <main class="ml-64 flex-1 p-6">

        <!-- TOPBAR -->
        <div class="flex items-center justify-between mb-6">
            <input type="text"
                   placeholder="Search..."
                   class="w-64 px-4 py-2 border rounded-lg text-sm focus:outline-none">

            <!-- USER DROPDOWN -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                        class="flex items-center gap-2 text-sm font-medium px-3 py-2 rounded-lg hover:bg-gray-100">
                    <i data-lucide="user-round" class="w-4 h-4"></i>
                    Profile
                    <i data-lucide="chevron-down" class="w-4 h-4"></i>
                </button>

                <div x-show="open" @click.outside="open = false"
                     class="absolute right-0 mt-2 w-40 bg-white border rounded-lg shadow-md overflow-hidden">

                    <a href="{{ route('profile.edit') }}"
                       class="block px-4 py-2 text-sm hover:bg-gray-100">
                        Manage Account
                    </a>

                                        <a href="{{ route('portofolio') }}"
                       class="block px-4 py-2 text-sm hover:bg-gray-100">
                        View Portofolio
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @yield('content')
    </main>
</div>

<script>
    lucide.createIcons();
</script>

@stack('scripts')
</body>
</html>
