<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/contact', function () {
    return view('contact');
});

// Restaurants web routes
Route::get('/restaurantes', [RestaurantController::class, 'webIndex'])->name('restaurants.index');
Route::get('/restaurantes/{slug}', [RestaurantController::class, 'webShow'])->name('restaurants.show');

//routs for the admin panel clear cache
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/clear-cache', function () {
        \Artisan::call('cache:clear');
        \Artisan::call('config:cache');
        \Artisan::call('view:clear');
        \Artisan::call('route:clear');
        return 'Cache cleared';
    })->name('admin.clear-cache');
});
