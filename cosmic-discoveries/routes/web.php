<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'is_admin'])
     ->prefix('admin')
     ->group(function () {
         Route::get('/', fn () => view('admin.dashboard'))
              ->name('admin.dashboard');
         Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
     });

     use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
