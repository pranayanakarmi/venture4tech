<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServicesController::class, 'index'])->name('services.index');
Route::get('/services/{service:slug}', [ServicesController::class, 'show'])->name('services.show');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{project:slug}', [PortfolioController::class, 'show'])->name('portfolio.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Admin routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('contacts', \App\Http\Controllers\Admin\ContactController::class)->only(['index', 'show', 'destroy']);
    Route::resource('hero-slides', \App\Http\Controllers\Admin\HeroSlideController::class)->except(['show']);
    Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class)->except(['show']);
    Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class)->except(['show']);
    Route::resource('technologies', \App\Http\Controllers\Admin\TechnologyController::class)->except(['show']);
    Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class)->except(['show']);
    Route::resource('team-members', \App\Http\Controllers\Admin\TeamMemberController::class)->except(['show']);
    Route::resource('partners', \App\Http\Controllers\Admin\PartnerController::class)->except(['show']);
    Route::resource('statistics', \App\Http\Controllers\Admin\StatisticController::class)->except(['show']);
    Route::get('site-settings', [\App\Http\Controllers\Admin\SiteSettingController::class, 'index'])->name('site-settings.index');
    Route::put('site-settings', [\App\Http\Controllers\Admin\SiteSettingController::class, 'update'])->name('site-settings.update');
});

// Auth routes via Fortify (login/logout are handled automatically)
Route::get('/login', function () {
    return \Inertia\Inertia::render('Auth/Login');
})->middleware('guest')->name('login');
