<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController1;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', [HomeController::class, 'index']);

Route::post('question/store', [QuestionController1::class, 'store'])
    ->name('question.store');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::resource('pelanggan', PelangganController::class);
Route::resource('user', UserController::class)->except(['show']);


