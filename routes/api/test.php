<?php


use App\Services\FileUpload;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Testing\EmailController;
use App\Services\TelegramService;

// ========================================================================>> Send Email
Route::post('/send-email', [EmailController::class, 'sendEmailRaw']);

// ========================================================================>> Telegram Bot

Route::get('/send-telegram-bot',[TelegramService::class,'sendMessage']);
// ========================================================================>> JSReport


// ========================================================================>> File Service

Route::post('/services/uploadFile', [FileUpload::class, 'uploadFile']);
