<?php
use App\Http\Controllers\Admin\DashboardController;
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

    
});