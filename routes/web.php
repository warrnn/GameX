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

// Guest
Route::get('/', [RoutesController::class, 'index'])->name('guest.index');

// Store
Route::get('/store', [RoutesController::class, 'store'])->name('buyer.store');
Route::get('/detail/{id}', [RoutesController::class, 'detail'])->name('buyer.detail');
Route::get('/store/offers', [RoutesController::class, 'offers'])->name('buyer.offers');
Route::get('/category/{name}', [RoutesController::class, 'category'])->name('buyer.category');

// Community
Route::get('/community', [RoutesController::class, 'community'])->name('buyer.community');

// Games
Route::get('/games', [RoutesController::class, 'games'])->name('buyer.games');

// Profile
Route::get('/profile', [RoutesController::class, 'profile'])->name('buyer.profile');