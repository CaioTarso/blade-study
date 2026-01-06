<?php

use App\Http\Controllers\TweetController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TweetController::class, 'index']);
Route::post('/tweets', [TweetController::class, 'store']);