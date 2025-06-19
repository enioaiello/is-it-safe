<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ForumController;
use Illuminate\Support\Facades\Route;

Route::post('/new_comment/{idForum}', [CommentController::class, 'addComment']);
Route::post('/new_forum/', [ForumController::class, 'addForum'])->name('addForum');
