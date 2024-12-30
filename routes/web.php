<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\RealtorController;
use App\Http\Controllers\UserAccountController;

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
});


// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



//require __DIR__.'/auth.php';
