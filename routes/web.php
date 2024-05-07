<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CatalogController;
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
Route::redirect('/', '/home');

Route::get('/welcome', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('welcome');

Route::get('/home', function () {
    return Inertia::render('Home', [
    ]);
})->name('home');

Route::get('/cart', function () {
    return Inertia::render('Cart', [
    ]);
})->name('cart');

Route::get('/success', function () {
    return Inertia::render('Success', [
    ]);
})->name('success');


Route::get('/about-us', function () {
    return Inertia::render('AboutUs', [
    ]);
})->name('AboutUs');

Route::get('/catalog', [CatalogController::class, 'catalog'])->name('catalog');

Route::get('/item/{id}', [CatalogController::class, 'item'])->name('item');
Route::post('/item', [CatalogController::class, 'item_store'])->name('item.store');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

