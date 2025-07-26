<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\TourDateController;
use App\Http\Controllers\RestaurantController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Authentication
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

//tours
Route::get('/tours-company/{id}', TourController::class.'@filterByCompany');

Route::get('/tours/{company_id}/{slug}', TourController::class.'@show');

//company
Route::get('/companies/{id}', CompanyController::class.'@show');

// Products
Route::get('/products-company/{id}', [ProductController::class, 'filterByCompany']);
Route::get('/products/{company_id}/{slug}', [ProductController::class, 'show']);

// Rooms
Route::get('/rooms-company/{id}', [RoomController::class, 'filterByCompany']);
Route::get('/rooms/{company_id}/{slug}', [RoomController::class, 'show']);

// Categories
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{slug}', [CategoryController::class, 'show']);

// Brands
Route::get('/brands', [BrandController::class, 'index']);
Route::get('/brands/{slug}', [BrandController::class, 'show']);

// Accommodations
Route::get('/accommodations-company/{id}', [AccommodationController::class, 'filterByCompany']);
Route::get('/accommodations-place/{id}', [AccommodationController::class, 'filterByPlace']);
Route::get('/accommodations/{company_id}/{slug}', [AccommodationController::class, 'show']);

// Tour Dates 
Route::get('/tour-dates', [TourDateController::class, 'index']);
Route::get('/tour-dates/company/{company_id}', [TourDateController::class, 'getByCompany']);
Route::get('/tour-dates/tour/{tour_id}', [TourDateController::class, 'getByTour']);

// Restaurants
Route::get('/restaurants-company/{id}', [RestaurantController::class, 'filterByCompany']);
Route::get('/restaurants-place/{id}', [RestaurantController::class, 'filterByPlace']);
Route::get('/restaurants/{company_id}/{slug}', [RestaurantController::class, 'show']);