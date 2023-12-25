<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\MapsController;

Route::get('/', function () {
    return redirect('/maps/index');
});

Route::get('/users/login', [UsersController::class, 'login'])->name('login');
Route::post('/users/login', [UsersController::class, 'login'])->name('login');
Route::get('/users/logout', [UsersController::class, 'logout'])->name('logout');
Route::post('/users/logout', [UsersController::class, 'logout'])->name('logout');
Route::get('/users/register', [UsersController::class, 'register'])->name('register');
Route::post('/users/register', [UsersController::class, 'register'])->name('register');
Route::get('users/manage', [UsersController::class, 'manage'])->name('manage');
Route::post('users/manage', [UsersController::class, 'manage'])->name('manage');
Route::get('/maps/index', [MapsController::class, 'index'])->name('index');

