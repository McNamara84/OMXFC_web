<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArbeitsgruppenController;
use App\Http\Controllers\EhrenmitgliederController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/arbeitsgruppen', [ArbeitsgruppenController::class, 'index'])->name('arbeitsgruppen');
Route::get('/ehrenmitglieder', [EhrenmitgliederController::class, 'index'])->name('ehrenmitglieder');

Route::get('/impressum', function () {
    return view('impressum');
})->name('impressum');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
