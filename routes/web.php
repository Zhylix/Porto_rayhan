<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortofolioController;

// Admin controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ExperienceController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('portofolio');
});

Route::get('/portofolio', [PortofolioController::class, 'index'])
    ->name('portofolio');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Dashboard user biasa
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->name('admin.')
->middleware(['auth', 'verified', 'admin'])
    ->group(function () {

        // Admin Dashboard
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])
            ->name('dashboard');

        // CRUD Resources
        Route::resource('project', ProjectController::class);
        Route::resource('experience', ExperienceController::class);
        Route::resource('education', EducationController::class);
    });

require __DIR__.'/auth.php';

//halaman about
Route::get('/about', function () {
    return view('portofolio.about');
})->name('about');