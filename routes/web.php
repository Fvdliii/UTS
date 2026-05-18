<?php

use App\Http\Controllers\IncomeController;
use App\Http\Controllers\OutcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',  [IncomeController::class, 'index']);

Route::get('/income', [IncomeController::class, 'index'])->name('income.index');
Route::get('/income/create', [IncomeController::class, 'create'])->name('income.create');
Route::post('/income/store', [IncomeController::class, 'store'])->name('income.store');
Route::get('/income/{income}/edit', [IncomeController::class, 'edit'])->name('income.edit');
Route::put('/income/{income}/edit', [IncomeController::class, 'update'])->name('income.update');

Route::resource('outcome', OutcomeController::class);

