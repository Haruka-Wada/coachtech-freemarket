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
Route::get('/item/{item_id?}', [ItemController::class, 'detail']);


Route::middleware('auth')->group(function(){
    Route::get('/mylist', [ItemController::class, 'mylist']);
    Route::get('/purchase/address/{item_id?}', [UserController::class, 'address']);
    Route::post('/purchase/address', [UserController::class, 'update']);
    Route::get('/purchase/{item_id?}', [ItemController::class, 'purchase'])->name('item.purchase');
    Route::get('/sell', [ItemController::class, 'sell']);
});
