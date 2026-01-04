<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\NewsController;


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

// Career Routes
Route::prefix('careers')->group(function () {
    Route::get('/', [CareerController::class, 'index']);           // GET all careers
    Route::post('/', [CareerController::class, 'store']);          // CREATE career
    Route::get('/{id}', [CareerController::class, 'show']);        // GET single career
    Route::put('/{id}', [CareerController::class, 'update']);      // UPDATE career
    Route::delete('/{id}', [CareerController::class, 'destroy']);  // DELETE career
});

// Partner Routes (About Section)
Route::prefix('partners')->group(function () {
    Route::get('/', [PartnerController::class, 'index']);          // GET all partners
    Route::post('/', [PartnerController::class, 'store']);         // CREATE partner
    Route::get('/{id}', [PartnerController::class, 'show']);       // GET single partner
    Route::put('/{id}', [PartnerController::class, 'update']);     // UPDATE partner
    Route::delete('/{id}', [PartnerController::class, 'destroy']); // DELETE partner
});

// Officer Routes (About Section)
Route::prefix('officers')->group(function () {
    Route::get('/', [OfficerController::class, 'index']);          // GET all officers
    Route::post('/', [OfficerController::class, 'store']);         // CREATE officer
    Route::get('/{id}', [OfficerController::class, 'show']);       // GET single officer
    Route::put('/{id}', [OfficerController::class, 'update']);     // UPDATE officer
    Route::delete('/{id}', [OfficerController::class, 'destroy']); // DELETE officer
});

// News Routes (About Section)
Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index']);             // GET all news
    Route::post('/', [NewsController::class, 'store']);            // CREATE news
    Route::get('/{id}', [NewsController::class, 'show']);          // GET single news
    Route::put('/{id}', [NewsController::class, 'update']);        // UPDATE news
    Route::delete('/{id}', [NewsController::class, 'destroy']);    // DELETE news
});

// Alternative: Using apiResource (shorthand for all above routes)
// Route::apiResource('sliders', SliderController::class);
// Route::apiResource('services', ServiceController::class);
// Route::apiResource('industries', IndustryController::class);
