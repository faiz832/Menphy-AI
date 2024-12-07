<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\AssessmentController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/search', [SearchController::class, 'search'])->name('search');

Route::middleware('auth')->group(function () {
    Route::get('/diagnosis', [DiagnosisController::class, 'index'])->name('front.diagnosis.index');
    Route::post('/diagnosis/process', [DiagnosisController::class, 'process'])->name('front.diagnosis.process');
    Route::get('/diagnosis/result/{id}', [DiagnosisController::class, 'showResult'])->name('front.diagnosis.result');

    // assessment
    Route::get('/assessments', [AssessmentController::class, 'index'])->name('assessments.index');
    Route::get('/assessments/create/{diagnosis}', [AssessmentController::class, 'create'])->name('assessments.create');
    Route::post('/assessments/{diagnosis}', [AssessmentController::class, 'store'])->name('assessments.store');
    Route::get('/assessments/{assessment}', [AssessmentController::class, 'show'])->name('assessments.show');

    // dashboard route
    Route::get('/home/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/account/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/account/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/account/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/account/settings', [ProfileController::class, 'settings'])->name('settings.edit');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/home/users', UserManagementController::class);
});

require __DIR__ . '/auth.php';
