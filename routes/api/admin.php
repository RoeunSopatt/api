<?php
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\POSController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


//=============> Create Route Dashboard<==================//
Route::get('/dashboard',[DashboardController::class,'getDashboardInfo']);

Route::group(['prefix'=> 'products'], function () {

    //=> Product
    Route::get('/',     [ProductController::class,  'getData']);
    Route::get('/{id}', [ProductController::class,  'view']);
    Route::post('/',    [ProductController::class,  'create']);
    Route::post('/{id}',[ProductController::class,  'update']);
    Route::delete('/{id}',[ProductController::class,'delete']);
    Route::get('/transactions/{id}', [ProductController::class,'getProduct']);

    //product type
    Route::get('/types', [ProductTypeController::class,'getData']);
    Route::post('/types',   [ProductTypeController::class, 'create']);
    Route::post('/types{id}', [ProductTypeController::class,'update']);
    Route::delete('/types{id}', [ProductTypeController::class,'delete']);

    
});
Route::group(['prefix'=> 'user'], function () {

    Route:: get('/types', [UserController::class,'getUserType']);
    Route::get('/', [UserController::class,'getData']);
    Route::get('/{id}', [UserController::class,'view']);
    Route::post('/', [UserController::class,'create']);
    Route::post('/{id}', [UserController::class,'update']);
    Route::delete('/{id}', [UserController::class,'delete']);

    Route::post('/block/{id}', [UserController::class,'block']);
    Route::post('/{id}/change-password', [UserController::class,'changePassword']);
});
//====================================>POS
Route::group(['prefix'=> 'pos'], function () {

    Route::get('/products', [POSController::class,'getProducts']);
    Route::post('/order', [POSController::class,'makeOrder']);
});