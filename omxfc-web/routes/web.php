<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EhrenmitgliederController;
use App\Http\Controllers\ArbeitsgruppenController;
use App\Http\Controllers\ImprintController;
use App\Http\Controllers\StatutesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FanHistoryController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/arbeitsgruppen', [ArbeitsgruppenController::class, 'index'])->name('arbeitsgruppen');
Route::get('/ehrenmitglieder', [EhrenmitgliederController::class, 'index'])->name('ehrenmitglieder');
Route::get('/satzung', [StatutesController::class, 'index'])->name('satzung');
Route::get('/impressum', [ImprintController::class, 'index'])->name('impressum');

Route::middleware(['auth', 'role:mitglied'])->group(function () {
    // Hier alle Routen, die nur Mitglieder sehen dürfen
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/fan-history', [FanHistoryController::class, 'update'])->name('fan-history.update');

    //Route für Vorstandsmitglieder
    Route::middleware(['role:vorstand'])->group(function () {
        Route::get('/dashboard/vorstand', [DashboardController::class, 'vorstandDashboard'])->name('dashboard.vorstand');
        Route::post('/anwaerter/{id}/annehmen', [DashboardController::class, 'annehmen'])->name('anwaerter.annehmen');
        Route::post('/anwaerter/{id}/ablehnen', [DashboardController::class, 'ablehnen'])->name('anwaerter.ablehnen');
    });
});

require __DIR__ . '/auth.php';
