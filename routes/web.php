<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[HomeController::class,'index']);

Route::post('question/store', [QuestionController1::class, 'store'])
		->name('question.store');

Route::get('dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');