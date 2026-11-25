<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SeoController;
use App\Http\Middleware\AdminOnly;
use App\Http\Middleware\SecurityHeaders;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

// Every route gets the security headers.
Route::middleware(SecurityHeaders::class)->group(function () {
    // SEO files.
    Route::get('/sitemap.xml', [SeoController::class, 'sitemap']);
    Route::get('/robots.txt', [SeoController::class, 'robots']);

    // Visitors landing on "/" go to the Arabic site.
    Route::redirect('/', '/ar');

    // Public pages, available in /ar and /en.
    Route::prefix('{locale}')->where(['locale' => 'ar|en'])->middleware(SetLocale::class)->group(function () {
        Route::get('/', [PageController::class, 'home'])->name('home');
        Route::get('/about', [PageController::class, 'about'])->name('about');
        Route::get('/shop', [PageController::class, 'shop'])->name('shop');
        Route::get('/product/{product}', [PageController::class, 'show'])->name('product');
        Route::get('/contact', [PageController::class, 'contact'])->name('contact');
    });

    // Admin login (limited to 5 tries per minute against brute force).
    Route::get('/admin/login', [DashboardController::class, 'loginForm'])->name('admin.login');
    Route::post('/admin/login', [DashboardController::class, 'login'])->middleware('throttle:5,1');

    // Protected dashboard.
    Route::middleware(AdminOnly::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/products', [DashboardController::class, 'store'])->name('store');
        Route::delete('/products/{product}', [DashboardController::class, 'destroy'])->name('destroy');
        Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
    });
});
