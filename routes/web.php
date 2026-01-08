<?php

use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\Auth\Register;
use Illuminate\Support\Facades\Route;

Route::get('/', [TweetController::class, 'index']);

Route::middleware('auth')->group(function (){
    
    Route::post('/tweets', [TweetController::class, 'store']);
    Route::get('/tweets/{tweet}/edit', [TweetController::class, 'edit']);
    Route::put('/tweets/{tweet}', [TweetController::class, 'update']);
    Route::delete('/tweets/{tweet}', [TweetController::class, 'destroy']);
});

Route::view('/register', 'auth.register')
    ->middleware('guest')
    ->name('register');
 
Route::post('/register', Register::class)
    ->middleware('guest');

Route::post('/logout', Logout::class)
    ->middleware('auth')
    ->name('logout');



Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');

Route::post('/login', Login::class)
    ->middleware('guest');