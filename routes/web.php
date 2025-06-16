<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/forum', [MainController::class, 'showForumPage'])->name('profile.edit');
    Route::get('/propos', [MainController::class, 'showProposPage'])->name('profile.edit');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/safe-it', [\App\Http\Controllers\MainController::class, 'showSafePage'])
        ->name('form');

    Route::get('/report-it', [\App\Http\Controllers\MainController::class, 'showReportpage'])
        ->name('form');

});

Route::get('/send-test-email', function () {
    Mail::to('ton.email@gmail.com')->send(new TestEmail());
    return "Email envoyé !";
});

require __DIR__.'/auth.php';
