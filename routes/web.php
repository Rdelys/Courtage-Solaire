<?php

use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;

/*
|--------------------------------------------------------------------------
| Web Routes - Site vitrine ÉnergiePlus
|--------------------------------------------------------------------------
*/

Route::get('/', [QuoteController::class, 'index'])->name('home');
Route::post('/demande-devis', [QuoteController::class, 'store'])->name('quote.store');
Route::post('/chatbot/send', [ChatbotController::class, 'send'])->name('chatbot.send');
Route::post('/chatbot/reset', [ChatbotController::class, 'reset'])->name('chatbot.reset');