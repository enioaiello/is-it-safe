<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::post('/new_comment/{idForum}', [CommentController::class, 'addComment']);
