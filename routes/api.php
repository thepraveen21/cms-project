<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\IndustryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Slider Routes
Route::prefix('sliders')->group(function () {
    Route::get('/', [SliderController::class, 'index']);           // GET all sliders
    Route::post('/', [SliderController::class, 'store']);          // CREATE slider
    Route::get('/{id}', [SliderController::class, 'show']);        // GET single slider
    Route::put('/{id}', [SliderController::class, 'update']);      // UPDATE slider
    Route::delete('/{id}', [SliderController::class, 'destroy']);  // DELETE slider
});

// Service Routes
Route::prefix('services')->group(function () {
    Route::get('/', [ServiceController::class, 'index']);          // GET all services
    Route::post('/', [ServiceController::class, 'store']);         // CREATE service
    Route::get('/{id}', [ServiceController::class, 'show']);       // GET single service
    Route::put('/{id}', [ServiceController::class, 'update']);     // UPDATE service
    Route::delete('/{id}', [ServiceController::class, 'destroy']); // DELETE service
});

// Industry Routes
Route::prefix('industries')->group(function () {
    Route::get('/', [IndustryController::class, 'index']);         // GET all industries
    Route::post('/', [IndustryController::class, 'store']);        // CREATE industry
    Route::get('/{id}', [IndustryController::class, 'show']);      // GET single industry
    Route::put('/{id}', [IndustryController::class, 'update']);    // UPDATE industry
    Route::delete('/{id}', [IndustryController::class, 'destroy']);// DELETE industry
});

// Alternative: Using apiResource (shorthand for all above routes)
// Route::apiResource('sliders', SliderController::class);
// Route::apiResource('services', ServiceController::class);
// Route::apiResource('industries', IndustryController::class);
