<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

Route::get('/', [MainController::class, 'index'])
    ->name('home');

Route::get('/dashboard', [MainController::class, 'showDashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/forum', [MainController::class, 'showForumPage'])->name('profile.edit');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/propos', [MainController::class, 'showProposPage'])->name('profile.edit');

Route::middleware('auth')->group(function () {
    Route::get('/safe-it', [\App\Http\Controllers\MainController::class, 'showSafePage'])
        ->name('safe');

    Route::get('/report-it', [\App\Http\Controllers\MainController::class, 'showReportpage'])
        ->name('report');

    Route::get('/admin', [\App\Http\Controllers\MainController::class, 'admin'])
        ->name('admin');

    Route::get('/report_log', [MainController::class, 'reportLog'])->name('report_log');

    Route::post('/result', [\App\Http\Controllers\MainController::class, 'showResultPage'])
        ->name('result');

    Route::post('/report/confirm', [MainController::class, 'reportInsertion'])
        ->name('confirm_report');

    Route::get('/forum/', [ForumController::class, 'showAllForm'])
        ->name('forum');

    Route::get('/forum/{id}', [ForumController::class, 'showForm'])
        ->name('forum');
});

Route::get('/send-test-email/{email}', function (string $email) {
    Mail::to($email)->send(new TestEmail());
    return "Email envoyé !";
});

Route::put('/edit/{id}', [CommentController::class, 'update']);
Route::delete('/delete/{id}', [CommentController::class, 'destroy']);


require __DIR__.'/auth.php';
