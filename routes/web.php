<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromotionsController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\SellerProfileController;
use App\Http\Controllers\SellGamesController;
use App\Http\Controllers\TransactionController;
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
// composer require midtrans/midtrans-php --ignore-platform-reqs


// Guest
Route::get('/', [RoutesController::class, 'index'])->name('guest.index');
Route::post('/login', [UserAuthController::class, 'login'])->name('guest.login');
Route::post('/register', [UserAuthController::class, 'register'])->name('guest.register');

// Buyer
Route::prefix('')->middleware('isLogin')->group(function () {
    // Store
    Route::get('/store', [RoutesController::class, 'store'])->name('buyer.store');
    Route::get('/detail/{game_id}', [RoutesController::class, 'detail'])->name('buyer.detail');
    Route::get('/payment/{game_id}', [RoutesController::class, 'payment'])->name('buyer.payment');
    Route::get('/store/offers', [RoutesController::class, 'offers'])->name('buyer.offers');
    Route::get('/category/{category_name}', [RoutesController::class, 'category'])->name('buyer.category');
    // Route::get('/payment-process', [RoutesController::class, 'paymentProcess'])->name('buyer.process');
    Route::post('/payment-midtrans', [TransactionController::class, 'process'])->name('buyer.midtrans');

    // Community
    Route::get('/community', [RoutesController::class, 'community'])->name('buyer.community');
    Route::post('/community', [CommunityController::class, 'addCommunity'])->name('community.store');
    Route::get('/thecomunities', [RoutesController::class, 'theComunities'])->name('buyer.theComunities');
    Route::get('/mycomunities', [RoutesController::class, 'myComunities'])->name('buyer.myComunities');
    Route::get('/detailCommunity/{id}', [RoutesController::class, 'detailCommunity'])->name('buyer.detailCommunity');

    // Games
    Route::get('/games', [RoutesController::class, 'games'])->name('buyer.games');
    Route::get('/play', [RoutesController::class, 'play'])->name('buyer.play');

    // Profile
    Route::get('/profile', [RoutesController::class, 'profile'])->name('buyer.profile');
    Route::put('/changename/{user_id}', [ProfileController::class, 'changeName'])->name('buyer.changeName');
    Route::put('/changedata', [ProfileController::class, 'changeData'])->name('buyer.changeData');
    Route::post('/registasseller', [BuyerController::class, 'registAsSeller'])->name('buyer.registAsSeller');
    Route::get('/logout', [UserAuthController::class, 'logout'])->name('buyer.logout');
});

// Seller
Route::prefix('seller')->middleware('isSeller')->group(function () {
    // Store
    Route::get('/sellgames', [RoutesController::class, 'sellGames'])->name('seller.sellGames');
    Route::get('/managegame/{game_id?}', [RoutesController::class, 'manageGame'])->name('seller.manageGame');
    Route::put('/updategame/{game_id}', [SellGamesController::class, 'updateGame'])->name('seller.updateGame');
    Route::delete('/deletegame/{seller_id}/{game_id}', [SellGamesController::class, 'deleteGame'])->name('seller.deleteGame');
    Route::post('/addgame', [SellGamesController::class, 'addGame'])->name('seller.addGame');

    Route::get('/managepromotion', [RoutesController::class, 'managePromotion'])->name('seller.managePromotion');
    Route::post('/adddiscount', [PromotionsController::class, 'addDiscount'])->name('seller.addDiscount');
    Route::put('/updatediscount/{sale_id}', [PromotionsController::class, 'updateDiscount'])->name('seller.updateDiscount');
    Route::delete('/deletediscount/{sale_id}', [PromotionsController::class, 'deleteDiscount'])->name('seller.deleteDiscount');

    Route::get('/transactionprocesses', [RoutesController::class, 'transactionProcesses'])->name('seller.transactionProcesses');

    // Profile
    Route::get('/profile', [RoutesController::class, 'sellerProfile'])->name('seller.profile');
    Route::put('/changedata', [SellerProfileController::class, 'sellerChangeData'])->name('seller.changeData');
});

// Admin
Route::prefix('admin')->middleware('isAdmin')->group(function () {
    // Users
    Route::get('/userslist', [RoutesController::class, 'usersList'])->name('admin.usersList');

    Route::get('/sellerverification', [RoutesController::class, 'sellerVerification'])->name('admin.sellerVerification');
    Route::put('/verifyseller/{seller_id}', [AdminController::class, 'verifySeller'])->name('admin.verifySeller');

    // Transactions
    Route::get('/transactions', [RoutesController::class, 'transactions'])->name('admin.transactions');

    // Categories
    Route::get('/categories', [RoutesController::class, 'categories'])->name('admin.categories');
    Route::post('/addcategory', [AdminController::class, 'addCategory'])->name('admin.addCategory');
    Route::put('/editcategory/{category_id}', [AdminController::class, 'editCategory'])->name('admin.editCategory');
    Route::delete('/deletecategory/{category_id}', [AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');

    // Admins
    Route::get('/admins', [RoutesController::class, 'admins'])->name('admin.admins');
    Route::post('/addadmin', [AdminController::class, 'addAdmin'])->name('admin.addAdmin');
    Route::delete('/deleteadmin/{admin_id}', [AdminController::class, 'deleteAdmin'])->name('admin.deleteAdmin');
});