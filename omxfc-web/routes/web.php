<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EhrenmitgliederController;
use App\Http\Controllers\ArbeitsgruppenController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/arbeitsgruppen', [ArbeitsgruppenController::class, 'index'])->name('arbeitsgruppen');
Route::get('/ehrenmitglieder', [EhrenmitgliederController::class, 'index'])->name('ehrenmitglieder');

Route::get('/impressum', function () {
    return view('impressum');
})->name('impressum');

Route::middleware(['auth', 'role:mitglied'])->group(function () {
    // Hier alle Routen, die nur Mitglieder sehen dürfen
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
