<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialAuthController;

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

// Oauth Authentication Routes
Route::prefix('auth')->name('auth.')->group(function () {
    Route::prefix('social')->name('social.')->group(function () {
        // Google Routes
        Route::prefix('google')->name('google.')->group(function () {
            Route::get('/', [SocialAuthController::class, 'redirectToGoogle'])->name('redirect');
            Route::get('/callback', [SocialAuthController::class, 'handleGoogleCallback'])->name('callback');
        });
    });
});

Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/report/{slug}', [PageController::class, 'report'])->name('report');
Route::get('/categories/{slug}', [PageController::class, 'category'])->name('category');
Route::get('/ads/', [PageController::class, 'ads'])->name('ads');


Route::get('/ad/{slug}', [ListingController::class, 'show'])->name('listing.show');

Route::get('/contact-us', function () {
    return view('contact');
})->name('contact');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/forms/contact', [FormController::class, 'contact'])->name('contact.form');
Route::post('/forms/newsletter', [FormController::class, 'newsletter'])->name('newsletter.form');
Route::post('/search', [FormController::class, 'search'])->name('search.form');
Route::post('/forms/review', [FormController::class, 'review'])->middleware(['auth', 'verified'])->name('review.form');
Route::post('/forms/report', [FormController::class, 'report'])->middleware(['auth', 'verified'])->name('report.form');
Route::post('/forms/favourite', [FormController::class, 'favourite'])->middleware(['auth', 'verified'])->name('favourite.form');

// generate storage link in cpanel, comment it out after you're done
// Route::get('/0iqmn70aan82', function () {

//     Artisan::call('storage:link');

//     dd("done");
// });

require __DIR__ . '/auth.php';
require __DIR__ . '/dashboard.php';
