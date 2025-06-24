<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\MessageController;
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
    Route::get('/switch_pictures/{id}', [ProfileController::class, 'switch_pictures']);
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/propos', [MainController::class, 'showProposPage'])->name('propos');
Route::get('/tos', [MainController::class, 'showTOSPage'])->name('tos');

Route::middleware('auth')->group(function () {
    Route::get('/safe-it', [\App\Http\Controllers\MainController::class, 'showSafePage'])
        ->name('safe');

    Route::get('/report-it', [\App\Http\Controllers\MainController::class, 'showReportpage'])
        ->name('report');

    Route::get('/admin', [\App\Http\Controllers\MainController::class, 'admin'])
        ->name('admin');

    Route::get('/message', [\App\Http\Controllers\MessageController::class, 'showPage'])
        ->name('message');

    Route::get('/report_log', [MainController::class, 'reportLog'])
        ->name('report_log');

    Route::post('/result/url', [\App\Http\Controllers\MainController::class, 'showResultPageUrl'])
        ->name('result_url');

    Route::post('/result/email', [\App\Http\Controllers\MainController::class, 'showResultPageEmail'])
        ->name('result_email');

    Route::post('/result/phone', [\App\Http\Controllers\MainController::class, 'showResultPagePhone'])
        ->name('result_phone');

    Route::post('/report/confirm', [MainController::class, 'reportInsertion'])
        ->name('confirm_report');

    Route::get('/forum/', [ForumController::class, 'showAllForm'])
        ->name('forum');

    Route::get('/forum/search/{trim}', [ForumController::class, 'showSpecForm'])
        ->name('forum_search');

    Route::get('/forum/{id}', [ForumController::class, 'showForm'])
        ->name('forum');

    Route::get('/report/accept/{id}', [MainController::class, 'reportAccept'])->name('accept');

    Route::get('/report/refuse/{id}', [MainController::class, 'reportRefuse'])->name('refuse');
});

Route::get('/send-test-email/{email}', function (string $email) {
    Mail::to($email)->send(new TestEmail());
    return "Email envoyé !";
});

Route::post('/add-message', [MessageController::class, 'addMessage']);

Route::put('/editComment/{id}', [CommentController::class, 'update']);
Route::delete('/deleteComment/{id}', [CommentController::class, 'destroy']);

Route::put('/editForum/{id}', [ForumController::class, 'update']);
Route::delete('/deleteForum/{id}', [ForumController::class, 'destroy']);


Route::delete('delete/{id}', [\App\Http\Controllers\AdminController::class, 'DeleteUser'])
    ->name('destroy');

Route::post('/edit', [\App\Http\Controllers\AdminController::class, 'edit'])
    ->name('edit');

Route::get('/admin/search/{pseudo}', [\App\Http\Controllers\AdminController::class, 'search'])->name('admin.users.search');

Route::get('/admin/users', [\App\Http\Controllers\AdminController::class, 'allUsers']);

Route::get('/admin/users/{user}/edit', [\App\Http\Controllers\AdminController::class, 'edit'])->name('admin.users.edit');
Route::post('/admin/users/update', [\App\Http\Controllers\AdminController::class, 'update'])->name('admin.users.update');









require __DIR__.'/auth.php';
