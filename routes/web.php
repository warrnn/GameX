<?php

use App\Http\Controllers\BuyerController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\SellGamesController;
use App\Http\Controllers\UserAuthController;
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
// php artisan storage:link

// Guest
Route::get('/', [RoutesController::class, 'index'])->name('guest.index');
Route::post('/login', [UserAuthController::class, 'login'])->name('guest.login');
Route::post('/register', [UserAuthController::class, 'register'])->name('guest.register');

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
    Route::post('/registasseller', [BuyerController::class, 'registAsSeller'])->name('buyer.registAsSeller');
    Route::get('/logout', [UserAuthController::class, 'logout'])->name('buyer.logout');
});

// Seller
Route::prefix('seller')->group(function () {
    // Store
    Route::get('/sellgames', [RoutesController::class, 'sellGames'])->name('seller.sellGames');
    Route::get('/managegame/{id?}', [RoutesController::class, 'manageGame'])->name('seller.manageGame');
    Route::delete('/deletegame/{seller_id}/{game_id}', [SellGamesController::class, 'deleteGame'])->name('seller.deleteGame');
    Route::post('/addgame', [SellGamesController::class, 'addGame'])->name('seller.addGame');

    Route::get('/managepromotion', [RoutesController::class, 'managePromotion'])->name('seller.managePromotion');
    Route::get('/transactionprocesses', [RoutesController::class, 'transactionProcesses'])->name('seller.transactionProcesses');

    // Profile
    Route::get('/profile', [RoutesController::class, 'sellerProfile'])->name('seller.profile');
});

// Admin
Route::prefix('admin')->group(function () {
    // Users
    Route::get('/userslist', [RoutesController::class, 'usersList'])->name('admin.usersList');
    Route::get('/sellerverification', [RoutesController::class, 'sellerVerification'])->name('admin.sellerVerification');

    // Transactions
    Route::get('/transactions', [RoutesController::class, 'transactions'])->name('admin.transactions');

    // Categories
    Route::get('/categories', [RoutesController::class, 'categories'])->name('admin.categories');

    // Admins
    Route::get('/admins', [RoutesController::class, 'admins'])->name('admin.admins');
});