<?php

use App\Http\Controllers\IncomeController;
use App\Http\Controllers\OutcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/income', [IncomeController::class, 'index'])->name('income.index');
Route::get('/income/create', [IncomeController::class, 'create']);

Route::resource('outcome', OutcomeController::class);

