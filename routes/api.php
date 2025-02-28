<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController;
use App\Http\Controllers\CompanyController;

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

Route::get('/tours/{id}', TourController::class.'@show');

//company
Route::get('/companies/{id}', CompanyController::class.'@show');

Route::get('/list-files', function () {
    $files = Storage::disk('public')->allFiles('tours/cover');
    return response()->json($files);
});