<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\DiagnosisManagementController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/search', [SearchController::class, 'search'])->name('search');

Route::middleware('auth')->group(function () {
    // front diagnosis
    Route::get('/diagnosis', [DiagnosisController::class, 'index'])->name('front.diagnosis.index');
    Route::post('/diagnosis/process', [DiagnosisController::class, 'process'])->name('front.diagnosis.process');
    Route::get('/diagnosis/result/{id}', [DiagnosisController::class, 'showResult'])->name('front.diagnosis.result');

    // diagnosis mangement
    Route::resource('/data/diagnosis', DiagnosisManagementController::class);

    // assessment
    Route::get('/data/therapy', [AssessmentController::class, 'index'])->name('assessments.index');
    Route::get('/data/therapy/create/{diagnosis}', [AssessmentController::class, 'create'])->name('assessments.create');
    Route::post('/data/therapy/{diagnosis}', [AssessmentController::class, 'store'])->name('assessments.store');
    Route::get('/data/therapy/{assessment}', [AssessmentController::class, 'show'])->name('assessments.show');

    // dashboard route
    Route::get('/home/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // profile
    Route::get('/account/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/account/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/account/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // settings
    Route::get('/account/settings', [ProfileController::class, 'settings'])->name('settings.edit');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/home/users', UserManagementController::class);
});

require __DIR__ . '/auth.php';
