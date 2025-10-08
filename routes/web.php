<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserViewController;


// Foydalanuvchi uchun
Route::get('/', [UserViewController::class, 'index'])->name('user.index');

// Admin uchun
Route::prefix('admin')->group(function () {
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('lessons', \App\Http\Controllers\Admin\LessonController::class);
});

