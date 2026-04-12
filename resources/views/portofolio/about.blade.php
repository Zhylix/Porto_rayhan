@extends('layouts.portofolio')

@section('content')

<nav x-data="{ open: false }" class="fixed top-0 w-full z-50 border-b border-white/10 shadow-2xl    ">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-3 sm:py-6 flex justify-between items-center">
        <!-- Logo -->
        <div class="flex items-center gap-3">
            <span class="text-xl font-bold text-white transition duration-300 hover:text-indigo-400">
                Rayhan Afif
            </span>
        </div>
        
        <!-- Desktop Nav -->
        <div class="hidden md:flex items-center gap-8">
            <div class="flex gap-4 sm:gap-8 text-xs sm:text-sm font-medium text-gray-300">
                <a href="/portofolio#home" class="nav-link relative group">Home
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="/portofolio#about" class="nav-link relative group">About
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="/portofolio#education" class="nav-link relative group">Education
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="/portofolio#experience" class="nav-link relative group">Experience
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="/portofolio#projects" class="nav-link relative group">Projects
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full group-hover:w-full transition-all duration-300"></span>
                </a>
            </div>
        @guest
            <a href="{{ route('login') }}" class="px-6 py-3 bg-blue-600 rounded-full text-white hover:bg-blue-700 transition hover:scale-105">Login</a>
        @endguest
        @auth
            <a href="{{ route('dashboard') }}" class="px-6 py-3 bg-blue-600 rounded-full text-white
                          hover:bg-blue-700 transition hover:scale-105">Dashboard</a>
        @endauth
        </div>

        <!-- Mobile Burger Button -->
        <div class="md:hidden">
            <button @click="open = !open" class="group flex items-center justify-center w-12 h-12  hover:bg-white/10 border border-white/20 rounded-xl shadow-md hover:shadow-xl transition-all focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <svg class="w-8 h-8 flex-shrink-0 text-gray-100 group-hover:text-white" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path v-if="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu Dropdown -->
    <div x-show="open" @click.away="open = false" class="md:hidden">
        <div class="fixed inset-0  z-40" @click="open = false"></div>
        <div x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-[-10px]"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 translate-y-[-10px]"
             class="fixed top-20 right-4 w-72 bg-black/95 border border-white/20 backdrop-blur-xl rounded-2xl shadow-2xl py-6 px-6 z-50">
            <div class="space-y-4">
                <a href="/portofolio#home" @click="open = false" class="nav-link block py-3 px-4 text-left relative group">
                    Home <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full group-hover:w-full transition-all duration-300 block"></span>
                </a>
                <a href="/portofolio#about" @click="open = false" class="nav-link block py-3 px-4 text-left relative group">
                    About <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full group-hover:w-full transition-all duration-300 block"></span>
                </a>
                <a href="/portofolio#education" @click="open = false" class="nav-link block py-3 px-4 text-left relative group">
                    Education <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full group-hover:w-full transition-all duration-300 block"></span>
                </a>
                <a href="/portofolio#experience" @click="open = false" class="nav-link block py-3 px-4 text-left relative group">
                    Experience <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full group-hover:w-full transition-all duration-300 block"></span>
                </a>
                <a href="/portofolio#projects" @click="open = false" class="nav-link block py-3 px-4 text-left relative group">
                    Projects <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full group-hover:w-full transition-all duration-300 block"></span>
                </a>
@guest
                <a href="{{ route('login') }}" @click="open = false" class="px-6 py-3 bg-blue-600 rounded-full text-white block text-center hover:bg-blue-700 transition hover:scale-105 mx-auto">Login</a>
            @endguest
            @auth
                <a href="{{ route('dashboard') }}" @click="open = false" class="px-6 py-3 bg-blue-600 rounded-full text-white block text-center hover:bg-blue-700 transition hover:scale-105 mx-auto">Dashboard</a>
            @endauth
            </div>
        </div>
    </div>
</nav>

{{-- ABOUT --}}
<section id="about" class="min-h-[80vh] sm:min-h-screen flex items-center bg-black pt-24">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 grid grid-cols-1 md:grid-cols-2 gap-12 sm:gap-16 items-center">

        <!-- LEFT: FOTO -->
        <div class="flex justify-center md:pr-10">
            <img src="{{ asset('images/profile.jpg')}}" 
                 alt="Profile Rayhan"
                 class="w-48 h-48 sm:w-64 sm:h-64 md:w-80 md:h-80 max-w-full object-cover rounded-2xl shadow-2xl border border-white/10 transition duration-300 hover:scale-105">
        </div>

        <!-- RIGHT: TEXT -->
        <div class="md:pl-10">
            <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">
                About Me
            </h2>

            <p class="text-gray-400 leading-relaxed mb-6 max-w-lg">
Hi everyone, my name is Muhammad Rayhan Khoirul Afif. You can contact me at Rayhan. I'm currently studying at SMK Negeri 1 Bangsri, majoring in Software & Game Development (PPLG). My enrollment in PPLG is also one of the reasons I created the portfolio website you see here. At my age, I'm quite a passionate person.
            </p>

            <!-- CTA -->
            <div class="flex gap-4 flex-wrap">
                <a href="/portofolio#projects" 
                   class="px-6 py-3 bg-blue-600 rounded-full text-white hover:bg-blue-700 transition hover:scale-105">
                    View Projects
                </a>
                <a href="/portofolio#contact" 
                   class="px-6 py-3 border border-white/20 rounded-full text-white hover:bg-white/10 transition hover:scale-105">
                    Contact
                </a>
            </div>
        </div>

    </div>
</section>

@endsection

