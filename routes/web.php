<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SearchController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/search', [SearchController::class, 'search'])->name('search');

Route::middleware('auth')->group(function () {
    Route::get('/diagnosis', [DiagnosisController::class, 'index'])->name('diagnosis.index');
    Route::post('/diagnosis/process', [DiagnosisController::class, 'process'])->name('diagnosis.process');
    Route::get('/diagnosis/result/{id}', [DiagnosisController::class, 'showResult'])->name('diagnosis.result');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
