@extends('layouts.portofolio')

@section('content')

@include('portofolio.partials.navbar')

{{-- HERO --}}
<section id="home" class="section min-h-[80vh] sm:min-h-screen bg-gradient-to-b from-gray-950 via-gray-900 to-gray-950 flex items-center pt-24 pb-12 sm:pb-0">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 grid grid-cols-1 md:grid-cols-2 gap-8 sm:gap-12 items-center fade">

        {{-- LEFT : TEXT --}}
        <div>
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
                Hi, Welcome👋 <br>
                <span class="text-blue-500">to My Portfolio </span>
            </h1>

            <p class="text-gray-400 max-w-lg mb-8">
                I build clean, scalable, and maintainable web applications
                using Laravel & modern web technologies.
            </p>

            {{-- CTA --}}
            <div class="flex gap-4">
                <a href="#projects"
                   class="px-6 py-3 bg-blue-600 rounded-full text-white
                          hover:bg-blue-700 transition hover:scale-105">
                    View Projects
                </a>

                <a href="#about"
                   class="px-6 py-3 border border-white/20 rounded-full text-white
                          hover:bg-white/10 transition hover:scale-105">
                    About Me
                </a>
            </div>

            {{-- TECH STACK --}}
            <div class="mt-10">
                <p class="text-sm text-gray-500 mb-3">Tech Stack</p>
                <div class="flex flex-wrap gap-3">
                    <span class="px-4 py-1 text-sm rounded-full bg-white/10 text-gray-300">Laravel</span>
                    <span class="px-4 py-1 text-sm rounded-full bg-white/10 text-gray-300">Tailwind CSS</span>
                    <span class="px-4 py-1 text-sm rounded-full bg-white/10 text-gray-300">MySQL</span>
                    <span class="px-4 py-1 text-sm rounded-full bg-white/10 text-gray-300">Git</span>
                </div>
            </div>
        </div>

        {{-- RIGHT : VISUAL --}}
        <div class="flex justify-center md:justify-end">
            <div class="relative bg-white/5 backdrop-blur border border-white/10
                        rounded-2xl p-6 sm:p-8 shadow-xl w-full max-w-xs sm:max-w-sm transition hover:scale-105">

                <p class="text-sm text-gray-400 mb-2">Currently working with</p>

                <pre class="text-sm text-blue-400 bg-black/60 rounded-xl p-4 overflow-hidden">
&lt;?php

Route::get('/portfolio', function () {
    return view('portfolio');
});

?&gt;
                </pre>
            </div>
        </div>
    </div>
</section>

{{-- ABOUT --}}
<section id="about" class="min-h-screen flex items-center bg-black">
    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">

        <!-- LEFT: FOTO -->
        <div class="flex justify-center md:pr-10">
            <img src="{{ asset('images/profile.jpg') }}" 
                 alt="Profile Rayhan"
                 class="w-64 h-64 md:w-80 md:h-80 max-w-full object-cover rounded-2xl shadow-2xl border border-white/10 transition duration-300 hover:scale-105">
        </div>

        <!-- RIGHT: TEXT -->
        <div class="md:pl-10">
            <h2 class="text-4xl font-bold text-white mb-4">
                About Me
            </h2>

            <p class="text-gray-400 leading-relaxed mb-6 max-w-lg">
                I'm Rayhan, a passionate 
                <span class="text-indigo-400 font-medium">Laravel developer</span> 
                who enjoys building scalable, clean, and user-friendly web applications.
            </p>

            <!-- Highlight -->
            <div class="flex gap-3 flex-wrap mb-6">
                <span class="px-3 py-1 bg-white/10 rounded-full text-sm text-gray-300">Laravel</span>
                <span class="px-3 py-1 bg-white/10 rounded-full text-sm text-gray-300">MySQL</span>
                <span class="px-3 py-1 bg-white/10 rounded-full text-sm text-gray-300">Tailwind</span>
            </div>

            <!-- CTA (optional biar lebih hidup) -->
            <a href="/about" 
               class="px-6 py-3 bg-blue-600 rounded-full text-white
                          hover:bg-blue-700 transition hover:scale-105">
                More
            </a>
        </div>

    </div>
</section>

{{-- EDUCATION --}}
<section id="education" class="section min-h-[80vh] sm:min-h-screen bg-gradient-to-b from-gray-950 via-gray-900 to-gray-950 flex items-center pt-24">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 fade">
        <h2 class="text-2xl sm:text-3xl font-bold mb-10 text-center text-white">
            Education
        </h2>
    

        <div class="relative border-l border-white/20 pl-6 space-y-10 max-w-3xl mx-auto md:pl-8">
            @foreach($educations as $education)
                <div class="relative pl-6">
                    <span class="absolute -left-[9px] top-1 w-4 h-4 bg-blue-600 rounded-full"></span>
                        <h3 class="font-semibold text-white">{{ $education->title }} - {{ $education->school }}</h3>
                        <p class="text-gray-400 text-sm">
                            {{ $education->start_year }} – {{ $education->end_year ?? 'Present' }}
                        </p>
                    </div>
            @endforeach
        </div>
    </div>
</section>

{{-- EXPERIENCE --}}
<section id="experience" class="section min-h-[80vh] sm:min-h-screen flex items-center pt-24">
    <div class="container mx-auto px-4 sm:px-6 fade">
        <h2 class="text-2xl sm:text-3xl font-bold mb-10 text-center text-white">
            Experience
        </h2>

<div class="flex justify-center">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl w-full">
        @foreach($experiences as $exp)
        <div class="bg-gray-900 border border-white/10 p-6 rounded-lg shadow hover:shadow-lg transition hover:scale-105 duration-300 min-h-[200px] flex flex-col justify-between">
            <div>
                <h3 class="text-xl font-semibold mb-2">{{ $exp->company }}</h3>
                <p class="text-white mb-1">{{ $exp->position }}</p>
            </div>
            <p class="text-gray-500 text-sm mt-auto">
                {{ $exp->start_year }} - {{ $exp->end_year ?? 'Present' }}
            </p>
        </div>
        @endforeach
    </div>
</div>
    </div>
</section>

{{-- PROJECTS --}}
<section id="projects" class="section min-h-[80vh] sm:min-h-screen flex items-center bg-gradient-to-b from-gray-950 via-gray-900 to-gray-950 py-12 pt-24">
    <div class="container mx-auto px-4 sm:px-6 fade">
    <div class="max-w-7xl mx-auto px-6 w-full fade">
        <h2 class="text-2xl sm:text-3xl font-bold mb-5 text-center text-white">
            Projects
        </h2>
        <p class="text-gray-400 text-center mb-10">Here are some of my recent projects</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($projects as $project)
                <div class="bg-black border border-white/10 rounded-xl p-6 transition hover:scale-105 shadow-lg hover:shadow-xl min-h-[300px] flex flex-col">
                    <div class="image flex-1 mb-4">
                        @if($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-40 sm:h-48 md:h-56 lg:h-60 object-cover rounded-lg">
                        @endif
                        <h3 class="text-xl font-semibold mb-2 text-white mt-4">{{ $project->title }}</h3>
                        <p class="text-gray-400 mb-4 flex-1">{{ $project->description }}</p>
                    </div>
                    <a href="{{ $project->link }}" target="_blank" class="text-blue-500 hover:underline inline-block">
                        View Project →
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
</section>

<!-- FOOTER -->
<footer id="contact" class="bg-gray-950 border-t border-white/10 pt-24">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-20">

        <!-- GRID -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

            <!-- Logo & Bio -->
            <div>
                <div class="flex items-center gap-4 mb-6">

                    <h3 class="text-xl font-bold text-white">
                        Rayhan Afif
                    </h3>
                </div>

                <p class="text-gray-400 leading-relaxed text-sm max-w-sm">
                    Laravel Developer focused on building clean, scalable, 
                    and user-friendly web applications.
                </p>
            </div>

            <!-- Navigation -->
            <div>
                <h4 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-6">
                    Navigation
                </h4>

                <div class="space-y-3">
                    <a href="#home" class="block text-gray-400 hover:text-indigo-400 transition">Home</a>
                    <a href="#about" class="block text-gray-400 hover:text-indigo-400 transition">About</a>
                    <a href="#projects" class="block text-gray-400 hover:text-indigo-400 transition">Projects</a>
                    <a href="#experience" class="block text-gray-400 hover:text-indigo-400 transition">Experience</a>
                </div>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-6">
                    Connect
                </h4>

                <div class="space-y-4">

                    <!-- Github -->
                    <a href="https://github.com/RayhanAfif-del" target="_blank"
                       class="flex items-center gap-3 text-gray-400 hover:text-indigo-400 transition group">
                        <div class="w-10 h-10 flex items-center justify-center rounded-lg bg-white/5 border border-white/10 group-hover:border-indigo-400/30">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12..."/>
                            </svg>
                        </div>
                        <span class="text-sm">@RayhanAfif-del</span>
                    </a>

                    <!-- Instagram -->
                    <a href="https://www.instagram.com/rhannnoo/" target="_blank"
                       class="flex items-center gap-3 text-gray-400 hover:text-indigo-400 transition group">
                        <div class="w-10 h-10 flex items-center justify-center rounded-lg bg-white/5 border border-white/10 group-hover:border-indigo-400/30">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <rect x="2" y="2" width="20" height="20" rx="5"/>
                            </svg>
                        </div>
                        <span class="text-sm">@rhannnoo</span>
                    </a>

                    <!-- Email -->
                    <div class="pt-4">
                        <p class="text-xs text-gray-500 mb-1">Email</p>
                        <a href="mailto:muhammadrayhan955@gmail.com"
                           class="text-indigo-400 text-sm hover:underline">
                            muhammadrayhan955@gmail.com
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-white/10 mt-16 pt-6 flex flex-col md:flex-row justify-between items-center gap-4">

            <p class="text-gray-500 text-xs">
                © {{ date('Y') }} 
                <span class="text-indigo-400">Rayhan Afif</span>. All rights reserved.
            </p>

            <button id="backToTop"
                class="flex items-center gap-2 text-xs text-gray-400 hover:text-indigo-400 transition opacity-0 pointer-events-none">
                ↑ Back to top
            </button>

        </div>
    </div>
</footer>

@endsection

@push('scripts')
<script>
// Smooth scroll with nav offset
document.addEventListener("DOMContentLoaded", () => {
    const navHeight = 80;
    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener("click", e => {
            e.preventDefault();
            const target = document.querySelector(link.getAttribute("href"));
            if (!target) return;

            const y = target.getBoundingClientRect().top + window.pageYOffset - navHeight;

            window.scrollTo({ top: y, behavior: "smooth" });
        });
    });

    // Navbar active
    const sections = document.querySelectorAll(".section");
    const navLinks = document.querySelectorAll(".nav-link");

    const navObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                navLinks.forEach(link => {
                    link.classList.remove("text-white", "font-semibold");
                    if (link.getAttribute("href") === `#${entry.target.id}`) {
                        link.classList.add("text-white", "font-semibold");
                    }
                });
            }
        });
    }, { threshold: 0.5 });

    sections.forEach(section => navObserver.observe(section));

    // Fade in
    const fades = document.querySelectorAll(".fade");

    const fadeObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("show");
            }
        });
    }, { threshold: 0.2 });

    fades.forEach(el => fadeObserver.observe(el));

    // Back to top
    const backToTopBtn = document.getElementById("backToTop");
    window.addEventListener("scroll", () => {
        if (window.scrollY > 300) {
            backToTopBtn.classList.remove("opacity-0", "pointer-events-none");
            backToTopBtn.classList.add("opacity-100", "pointer-events-auto");
        } else {
            backToTopBtn.classList.add("opacity-0", "pointer-events-none");
            backToTopBtn.classList.remove("opacity-100");
        }
    });
    backToTopBtn.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });
});
</script>
@endpush

