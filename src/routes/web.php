<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ItemController::class, 'index']);
Route::get('/item/comment/{item_id?}', [ItemController::class, 'comment']);
Route::get('/item/{item_id?}', [ItemController::class, 'detail']);


Route::middleware('auth')->group(function(){
    Route::get('/mylist', [ItemController::class, 'mylist']);
    Route::get('/purchase/address/{item_id?}', [UserController::class, 'address']);
    Route::post('/purchase/address', [UserController::class, 'update']);
    Route::get('/purchase/{item_id?}', [ItemController::class, 'purchase'])->name('item.purchase');
    Route::post('/favorite', [ItemController::class, 'favorite']);
    Route::get('/mypage', [ItemController::class, 'mypage']);
    Route::get('/mypage/profile', [UserController::class, 'profile']);
    Route::post('/mypage/profile', [UserController::class, 'store']);
    Route::get('/sell', [ItemController::class, 'sell']);
    Route::post('/sell', [ItemController::class, 'store']);
    Route::post('/comment', [ItemController::class, 'post']);
    Route::post('/comment/delete', [ItemController::class, 'delete']);
});
