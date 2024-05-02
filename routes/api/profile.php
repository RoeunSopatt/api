<?php


use App\Http\Controllers\Profile\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyProfile\MyProfileController;

Route::get('/',                 [ProfileController::class, 'view']);
Route::post('/',                [ProfileController::class, 'update']);
Route::post('/change-password', [ProfileController::class, 'changePassword']);

