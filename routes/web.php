<?php

use App\Http\Controllers\RoutesController;
use Illuminate\Support\Facades\Route;

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

// composer install --ignore-platform-reqs

// Guest
Route::get('/', [RoutesController::class, 'index'])->name('guest.index');

// Buyer
Route::prefix('')->group(function () {
    // Store
    Route::get('/store', [RoutesController::class, 'store'])->name('buyer.store');
    Route::get('/detail/{id}', [RoutesController::class, 'detail'])->name('buyer.detail');
    Route::get('/payment/{id}', [RoutesController::class, 'payment'])->name('buyer.payment');
    Route::get('/store/offers', [RoutesController::class, 'offers'])->name('buyer.offers');
    Route::get('/category/{name}', [RoutesController::class, 'category'])->name('buyer.category');

    // Community
    Route::get('/community', [RoutesController::class, 'community'])->name('buyer.community');
    Route::get('/thecomunities', [RoutesController::class, 'theComunities'])->name('buyer.theComunities');
    Route::get('/mycomunities', [RoutesController::class, 'myComunities'])->name('buyer.myComunities');
    Route::get('/detailCommunity/{id}', [RoutesController::class, 'detailCommunity'])->name('buyer.detailCommunity');

    // Games
    Route::get('/games', [RoutesController::class, 'games'])->name('buyer.games');
    Route::get('/play', [RoutesController::class, 'play'])->name('buyer.play');

    // Profile
    Route::get('/profile', [RoutesController::class, 'profile'])->name('buyer.profile');
});

// Seller
Route::prefix('seller')->group(function () {
    // Store
    Route::get('/sellgames', [RoutesController::class, 'sellGames'])->name('seller.sellGames');

    // Profile
    Route::get('/profile', [RoutesController::class, 'sellerProfile'])->name('seller.profile');
});
