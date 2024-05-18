<?php


use App\Services\FileUpload;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Testing\EmailController;

// ========================================================================>> Send Email
Route::post('/send-email', [EmailController::class, 'sendEmailRaw']);

// ========================================================================>> Telegram Bot


// ========================================================================>> JSReport


// ========================================================================>> File Service

Route::post('/services/uploadFile', [FileUpload::class, 'uploadFile']);
