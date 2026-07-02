<?php

use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Site vitrine ÉnergiePlus
|--------------------------------------------------------------------------
*/

Route::get('/', [QuoteController::class, 'index'])->name('home');
Route::post('/demande-devis', [QuoteController::class, 'store'])->name('quote.store');
