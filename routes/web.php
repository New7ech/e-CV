<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CvController;
use App\Http\Controllers\PdfController;

use App\Http\Controllers\LetterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cv/create/{template?}', [CvController::class, 'create'])->name('cv.create');
Route::post('/cv', [CvController::class, 'store'])->name('cv.store');
Route::get('/cv/{cv}/pdf', [PdfController::class, 'generate'])->name('cv.pdf');
use App\Http\Controllers\DashboardController;

Route::get('/letter/create', [LetterController::class, 'create'])->name('letter.create');
Route::post('/letter', [LetterController::class, 'store'])->name('letter.store');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
