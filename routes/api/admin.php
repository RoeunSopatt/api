<?php
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;


//=============> Create Route Dashboard<==================//
Route::get('/dashboard',[DashboardController::class,'getDashboardInfo']);