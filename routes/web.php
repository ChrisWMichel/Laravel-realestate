<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\RealtorController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\ListingImageController;

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/hello', [IndexController::class, 'show'])->name('hello');

Route::resource('listing', ListingController::class)->only('index', 'show');

Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');
Route::resource('user-account', UserAccountController::class)->only('create', 'store');

Route::prefix('realtor')->name('realtor.')->middleware('auth')->group(function () {
    Route::name('listing.restore')->put('listing/{listing}/restore', [RealtorController::class, 'restore']);
    Route::resource('listing', RealtorController::class)->only('index', 'destroy', 'edit', 'update', 'create', 'store');
    Route::resource('listing.image', ListingImageController::class)->only('store', 'create', 'destroy');
});


// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



//require __DIR__.'/auth.php';
