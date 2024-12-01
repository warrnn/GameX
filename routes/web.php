<?php

use App\Http\Controllers\UserRoutesController;
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

Route::get('/', [UserRoutesController::class, 'index'])->name('user.index');
Route::get('/store', [UserRoutesController::class, 'store'])->name('user.store');
Route::get('/detail/{id}', [UserRoutesController::class, 'detail'])->name('user.detail');
Route::get('/store/offers', [UserRoutesController::class, 'offers'])->name('user.offers');
Route::get('/category/{name}', [UserRoutesController::class, 'category'])->name('user.category');
Route::get('/community', [UserRoutesController::class, 'community'])->name('user.community');
Route::get('/games', [UserRoutesController::class, 'games'])->name('user.games');
Route::get('/profile', [UserRoutesController::class, 'profile'])->name('user.profile');