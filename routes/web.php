<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OfferController;
use App\Http\Requests\VerifyEmailRequest;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\RealtorController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\ListingImageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NotificationSeenController;
use App\Http\Controllers\RealtorAcceptOfferController;

Route::get('/', [IndexController::class, 'index'])->name('home');
//Route::get('/hello', [IndexController::class, 'show'])->name('hello');

Route::resource('listing', ListingController::class)->only('index', 'show');

Route::resource('listing.offer', OfferController::class)->middleware('auth')->only('store');
Route::resource('notification', NotificationController::class)->only(['index'])->middleware('auth');

Route::put('notification/{notification}/seen', [NotificationSeenController::class, '__invoke'])->middleware('auth')->name('notification.seen');

Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');


Route::prefix('realtor')->name('realtor.')->middleware(['auth', 'verified'])->group(function () {
    Route::name('listing.restore')->put('listing/{listing}/restore', [RealtorController::class, 'restore']);

    Route::middleware(['auth'])->group(function () {
        Route::put('realtor/offer/{offer}/accept', [RealtorAcceptOfferController::class, '__invoke'])->name('offer.accept');
    });

    Route::resource('listing', RealtorController::class);
    Route::resource('listing.image', ListingImageController::class)->only('store', 'create', 'destroy');

});

Route::resource('user-account', UserAccountController::class)->only('create', 'store');

Route::get('/email/verify', function(){
    return Inertia::render('Auth/VerifyEmail');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (VerifyEmailRequest  $request) {
    try {
        $request->fulfill();

        //Auth::login($request->user());

        return redirect()->route('listing.index')->with('success', 'Email verified successfully.');

    } catch (\Exception $e) {
        dd($e);
    }
})->middleware(['signed'])->name('verification.verify');



Route::post('/email/resend', [AuthController::class, 'resendVerification'])
    ->middleware('throttle:6,1')
    ->name('verification.resend');


    Route::get('/clear-cache', function() {
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        Artisan::call('route:cache');
        Artisan::call('view:clear');
        return "Cache is cleared";
    });

