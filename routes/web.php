<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DashboardController;
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

Route::get('/catalog', [CatalogController::class, 'catalog'])->name('catalog');

Route::get('/about-us', function () {
    return Inertia::render('AboutUs', [
    ]);
})->name('AboutUs');

Route::get('/item/{id}', [CatalogController::class, 'item'])->name('item');

Route::get('/cart', function () {
    return Inertia::render('Cart', [
    ]);
})->name('cart');

Route::post('/cart', [CatalogController::class, 'cart_store'])->name('cart.store');

Route::get('/success', function () {
    return Inertia::render('Success', [
    ]);
})->name('success');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'orders'])->middleware(['verified'])->name('dashboard');
    Route::post('/dashboard', [DashboardController::class, 'order_destroy'])->middleware(['verified'])->name('dashboard.order.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

