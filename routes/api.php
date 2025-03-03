<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;

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
Route::get('/rooms/{company_id}/{id}', [RoomController::class, 'show']);

// Categories
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{slug}', [CategoryController::class, 'show']);

// Brands
Route::get('/brands', [BrandController::class, 'index']);
Route::get('/brands/{slug}', [BrandController::class, 'show']);