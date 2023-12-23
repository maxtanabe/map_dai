<?php

use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return redirect('/users/login');
});

Route::get('/users/login', [UsersController::class, 'login'])->name('login');
Route::post('/users/login', [UsersController::class, 'login'])->name('login');
Route::get('/users/logout', [UsersController::class, 'logout'])->name('logout');
Route::post('/users/logout', [UsersController::class, 'logout'])->name('logout');
Route::get('/users/register', [UsersController::class, 'register'])->name('register');
Route::post('/users/register', [UsersController::class, 'register'])->name('register');
