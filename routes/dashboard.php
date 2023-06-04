<?php

use App\Http\Controllers\DashboardPageController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::post('/dashboard/listing/create', [ListingController::class, 'store'])->middleware(['auth', 'verified'])->name('listing.create');
Route::post('/dashboard/listing/edit', [ListingController::class, 'edit'])->middleware(['auth', 'verified'])->name('listing.edit');
Route::patch('/dashboard/listing/update/{slug}', [ListingController::class, 'update'])->middleware(['auth', 'verified'])->name('listing.update');
Route::delete('/dashboard/listing/destroy/{slug}', [ListingController::class, 'destroy'])->middleware(['auth', 'verified'])->name('listing.destroy');

Route::prefix('dashboard')->controller(DashboardPageController::class)->name('dashboard.')->group(function () {
    Route::get('/', 'index')->middleware(['auth', 'verified',])->name('index');
    Route::get('/post-ad', 'create')->middleware(['auth', 'verified'])->name('create');
    Route::get('/edit-ad/{slug}', 'edit')->middleware(['auth', 'verified'])->name('edit');
    Route::get('/featured-ads', 'featured')->middleware(['auth', 'verified'])->name('featured');
    Route::get('/favourites', 'favourites')->middleware(['auth', 'verified'])->name('favourites');
});

Route::get('/dashboard/profile', [ProfileController::class, 'profile'])->middleware(['auth', 'verified'])->name('dashboard.profile');
Route::get('/dashboard/security', [ProfileController::class, 'security'])->middleware(['auth', 'verified'])->name('dashboard.security');

Route::prefix('dashboard/listings')->controller(ListingController::class)->name('listing.')->group(function () {
    Route::post('/store', 'store')->name('store');
});
