<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\IndustryController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\OfficerController;
use App\Http\Controllers\Admin\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('sliders', SliderController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('industries', IndustryController::class);
    Route::resource('careers', CareerController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('officers', OfficerController::class);
    Route::resource('news', NewsController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';