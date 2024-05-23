<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::redirect('/', '/catalog');
Route::redirect('/home', '/catalog');

Route::prefix('catalog')->group(function () {
    Route::get('/', [CatalogController::class, 'index'])->name('catalog');
    Route::get('{id}', [CatalogController::class, 'show'])->name('catalog.show');
});

Route::get('/about-us', function () {return Inertia::render('AboutUs', ['imageBg' => asset('images/aboutUS.jpg')]);})->name('about_us');

Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart');
    Route::post('/', [CartController::class, 'store'])->name('cart.store');
    Route::get('/success', [CartController::class, 'success'])->name('cart.success');
});

Route::middleware('auth')->group(function () {
    Route::prefix('admin-dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::delete('{id}', [DashboardController::class, 'destroy'])->name('order.destroy');
    });
    Route::prefix('admin-profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__.'/auth.php';

