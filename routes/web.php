<?php

use App\Http\Controllers\TweetController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TweetController::class, 'index']);
Route::post('/tweets', [TweetController::class, 'store']);
Route::get('/tweets/{tweet}/edit', [TweetController::class, 'edit']);
Route::put('/tweets/{tweet}', [TweetController::class, 'update']);
Route::delete('/tweets/{tweet}', [TweetController::class, 'destroy']);